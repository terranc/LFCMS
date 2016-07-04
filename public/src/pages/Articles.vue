<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div div class="wrapper" id="articles">
    <main class="main main-footer" v-if="listOfArticle.length">
      <group :title='content'>
        <cell v-for="article in listOfArticle" :title="article.title" is-link v-link="{name: 'article', params: {id: article.id}}"></cell>
      </group>
    </main>
    <navigation-bar></navigation-bar>
  </div>
</template>

<style lang="scss">
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';

export default {
  data() {
    return {
      content: 'articles page',
      title: 'articles',
      listOfArticle: [],
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Group,
    Cell,
  },
  route: {
    data() {
      return this.$http.get('https://cnodejs.org/api/v1/topics').then((response) => ({ listOfArticle: response.data.data }));
    },
  },
};
</script>
