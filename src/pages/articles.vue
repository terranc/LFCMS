<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="articles">
    <list-wrapper 
      class="main main-footer"
      url="https://cnodejs.org/api/v1/topics"
      v-ref:main
      :query="query"
      @on-getmore="getMore"  
      @on-attached="onListDone"
      >
      <group :title='content' v-if="listOfArticle.length > 0">
        <cell v-for="article in listOfArticle" :title="article.title" is-link v-link="{name: 'article', params: {id: article.id}, query: {t: 123}}"></cell>
      </group>
    </list-wrapper>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import ListWrapper from 'components/vux-extension/list-wrapper';
import { LFTabbar } from '../vuex/actions';

export default {
  props: {
    increment: {
      type: Number,
      default: 20,
    },
  },
  ready() {
    LFTabbar.show();
    window.addEventListener('beforeunload', () => {
      sessionStorage.removeItem('articlesQuery');
    });
  },
  data() {
    return {
      content: 'articles page',
      title: 'articles',
      query: {
        limit: 20,
      },
      listOfArticle: [],
    };
  },
  components: {
    VueHelmet,
    Group,
    Cell,
    ListWrapper,
  },
  route: {
    activate(transition) {
      if (sessionStorage.articlesQuery) {
        this.query = JSON.parse(sessionStorage.articlesQuery);
      }
      transition.next();
    },
    deactivate(transition) {
      this.$refs.main.cache();
      sessionStorage.articlesQuery = JSON.stringify(this.query);
      transition.next();
    },
  },
  methods: {
    onListDone(cache) {
      if (cache == null || cache.data == null) {
        this.$refs.main.fetchData().then((response) => {
          this.listOfArticle = response.data.data;
        });
      } else {
        this.listOfArticle = cache.data;
      }    
    },
    getMore() {
      this.query.limit += this.increment;
      this.$refs.main.fetchData({ query: this.query }).then((response) => {
        this.listOfArticle = response.data.data;
      });
    },
  },
};
</script>
