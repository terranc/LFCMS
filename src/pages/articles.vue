<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="articles">
    <list-wrapper
      class="main main-footer"
      v-ref:main
      :data="listOfArticle"
      @on-getmore="fetchMore"  
      >
      <group :title='content' v-if="listOfArticle">
        <cell v-for="article in listOfArticle" :title="article.title" is-link v-link="{name: 'article', params: {id: article.id}, query: {t: 123}}"></cell>
      </group>
    </list-wrapper>
  </div>
  <load v-ref:load></load>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import ListWrapper from 'components/vux-extension/list-wrapper';
import Load from 'components/vux-extension/load';
import querystring from 'querystring';
import { LFTabbar } from '../vuex/actions';

export default {
  data() {
    return {
      content: 'articles page',
      title: 'articles',
      listOfArticle: [],
      increment: 20,
      isFetching: false,
      query: {
        limit: 20,
      },
      url: 'https://cnodejs.org/api/v1/topics',
    };
  },
  ready() {
    LFTabbar.show();
    window.addEventListener('beforeunload', () => {
      sessionStorage.removeItem('articlesQuery');
    });
    this.initData();
  },
  components: {
    VueHelmet,
    Group,
    Cell,
    ListWrapper,
    Load,
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
    fetchData() {
      this.$refs.load.deferShowLoading(0);
      this.$http.get(`${this.url}?${querystring.stringify(this.query)}`).then((response) => {
        this.isFetching = false;
        this.$refs.load.reset();
        this.listOfArticle = response.data.data;
        return response;
      }, (response) => {
        this.isFetching = false;
        this.$refs.load.showFail();
        return response;
      });    
    },
    initData() {
      if (this.$refs.main.data.length === 0) {
        this.fetchData();
      } else {
        this.listOfArticle = this.$refs.main.data;
      }    
    },
    fetchMore() {
      if (!this.isFetching) {
        this.query.limit += this.increment;
        this.fetchData();
      }
    },
  },
};
</script>
