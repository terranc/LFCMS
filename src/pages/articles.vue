<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="articles">
    <main class="main main-footer" v-if="listOfArticle.length">
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
import { LFTabbar } from '../vuex/actions';

export default {
  ready() {
    LFTabbar.show();
  },
  data() {
    return {
      content: 'articles page',
      title: 'articles',
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
  },
  methods: {
    getListOfArticle() {
      this.$refs.load.deferShowLoading();
      return this.$http.get('https://cnodejs.org/api/v1/topics').then((response) => {
        this.$refs.load.reset();
        this.listOfArticle = response.data.data;
        sessionStorage.listOfArticle = JSON.stringify(response.data.data);
      }, () => {
        this.$refs.load.showFail();
      });    
    },
  },
};
</script>
