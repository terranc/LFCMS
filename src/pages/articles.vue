<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="articles">
    <content-wrapper :attributes="{ class: 'main main-footer' }" @on-scroll="getListOfArticleOnScroll" save-scroll-when-to="article" v-ref:main>
      <group :title='content'>
        <cell v-for="article in listOfArticle" :title="article.title" is-link v-link="{name: 'article', params: {id: article.id}}"></cell>
      </group>
    </content-wrapper>
  </div>
  <load v-ref:load></load>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import Load from 'components/vux-extension/load';
import ContentWrapper from 'components/vux-extension/content-wrapper';
import querystring from 'querystring';
import { LFTabbar } from '../vuex/actions';

export default {
  ready() {
    LFTabbar.show();
  },
  data() {
    return {
      content: 'articles page',
      title: 'articles',
      query: {
        limit: 20,
      },
      isFetching: false,
      listOfArticle: [],
    };
  },
  components: {
    VueHelmet,
    Group,
    Cell,
    Load,
    ContentWrapper,
  },
  route: {
    data(transition) {
      if (sessionStorage.listOfArticle == null || transition.from.name !== 'article') {
        this.getListOfArticle();
      } else {
        this.listOfArticle = JSON.parse(sessionStorage.listOfArticle);
      }
    },
    activate(transition) {
      this.$refs.main.activate(transition);
      transition.next();
    },
    deactivate(transition) {
      if (transition.to.name === 'article') {
        sessionStorage.listOfArticle = JSON.stringify(this.listOfArticle);
        sessionStorage.query = JSON.stringify(this.query);
      } else {
        sessionStorage.removeItem('listOfArticle');
        sessionStorage.removeItem('query');
      }
      this.$refs.main.deactivate(transition);
      transition.next();
    },
  },
  methods: {
    getListOfArticle() {
      this.isFetching = true;
      this.$refs.load.deferShowLoading();
      return this.$http.get(`https://cnodejs.org/api/v1/topics?${querystring.stringify(this.query)}`).then((response) => {
        this.isFetching = false;
        this.$refs.load.reset();
        this.listOfArticle = response.data.data;
      }, () => {
        this.isFetching = false;
        this.$refs.load.showFail();
      });    
    },
    getListOfArticleOnScroll(e) {
      if (!this.isFetching) {
        const targetElm = e.target;
        const totalTop = targetElm.scrollTop + targetElm.clientHeight;
        if (totalTop >= targetElm.scrollHeight - 200) {
          this.query.limit += 20;
          this.getListOfArticle();
        }
      }
    },
  },
};
</script>
