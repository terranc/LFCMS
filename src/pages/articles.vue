<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="articles">
    <content-wrapper :attributes="{ class: 'main main-footer' }" @on-scroll="getListOfArticleOnScroll" save-scroll-when-to="article" v-ref:main>
      <group :title='content' v-if="listOfArticle.length > 0">
        <cell v-for="article in listOfArticle" :title="article.title" is-link v-link="{name: 'article', params: {id: article.id}, query: {t: 123}}"></cell>
      </group>
      <group v-if="listOfArticle.length > 0 && isAutoLoad === false">
        <x-button @click="onMoreClick">
          <span v-if="!isFetching">加载更多</span>
          <spinner type="ios" v-if="isFetching"></spinner>
        </x-button>
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
import Spinner from 'vux-components/spinner';
import XButton from 'vux-components/x-button';
import Load from 'components/vux-extension/load';
import ContentWrapper from 'components/vux-extension/content-wrapper';
import querystring from 'querystring';
import { LFTabbar } from '../vuex/actions';

export default {
  props: {
    isAutoLoad: {
      type: Boolean,
      default: false,
    },
    isFetching: {
      type: Boolean,
      default: false,
    },
    increment: {
      type: Number,
      default: 20,
    },
    autoLoadDistance: {
      type: Number,
      default: 1,
    },
  },
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
      listOfArticle: [],
    };
  },
  components: {
    VueHelmet,
    Group,
    Cell,
    Load,
    ContentWrapper,
    Spinner,
    XButton,
  },
  route: {
    data(transition) {
      if (sessionStorage.listOfArticle == null || transition.from.name !== 'article') {
        this.getListOfArticle();
      } else {
        this.listOfArticle = JSON.parse(sessionStorage.listOfArticle);
        this.query = JSON.parse(sessionStorage.query);
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
      this.$refs.load.deferShowLoading(0);
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
      if (!this.isFetching && this.isAutoLoad) {
        const targetElm = e.target;
        const totalTop = targetElm.scrollTop + targetElm.clientHeight;
        if (totalTop >= targetElm.scrollHeight - this.autoLoadDistance) {
          this.query.limit += this.increment;
          this.getListOfArticle();
        }
      }
    },
    onMoreClick() {
      this.query.limit += this.increment;
      this.getListOfArticle();
    },
  },
};
</script>
