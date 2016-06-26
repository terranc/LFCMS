<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div id="index">
    <x-header>{{ title }}</x-header>
    <h1>{{ content }}</h1>
    <navigation-bar></navigation-bar>
  </div>
</template>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import XHeader from 'vux-components/x-header';

export default {
  data() {
    return {
      content: 'index page',
      title: 'index',
    };
  },
  components: {
    XHeader,
    VueHelmet,
    NavigationBar,
  },
};
</script>
