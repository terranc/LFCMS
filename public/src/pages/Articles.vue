<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div id="articles">
    <group :title='content'>
      <cell title="Test article 1" is-link v-link="{name: 'article', params: {id: '1'}}"></cell>
      <cell title="Test article 2" is-link v-link="{name: 'article', params: {id: '2'}}"></cell>
      <cell title="Test article 3" is-link v-link="{name: 'article', params: {id: '3'}}"></cell>
    </group>
    <navigation-bar></navigation-bar>
  </div>
</template>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/Cell';

export default {
  data() {
    return {
      content: 'articles page',
      title: 'articles',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Group,
    Cell,
  },
};
</script>
