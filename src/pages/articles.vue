<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="articles">
    <main class="main main-footer" v-el:main>
      <group :title='content'>
        <cell v-for="article in listOfArticle" :title="article.title" is-link v-link="{name: 'article', params: {id: article.id}}"></cell>
      </group>
    </main>
  </div>
  <load v-ref:load></load>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import Load from 'components/vux_extension/load';
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
      console.log(transition);
      this.$els.main.addEventListener('scroll', this.getListOfArticleOnScroll);
      this.$nextTick(() => {
        this.$els.main.scrollTop = sessionStorage.scrollTop;
      });
      transition.next();
    },
    deactivate(transition) {
      this.$els.main.removeEventListener('scroll', this.getListOfArticleOnScroll);
      if (transition.to.name === 'article') {
        sessionStorage.listOfArticle = JSON.stringify(this.listOfArticle);
        sessionStorage.query = JSON.stringify(this.query);
        sessionStorage.scrollTop = this.$els.main.scrollTop;
      } else {
        sessionStorage.removeItem('scrollTop');
        sessionStorage.removeItem('listOfArticle');
        sessionStorage.removeItem('query');
      }
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
