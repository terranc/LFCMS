<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div id="index">
    <navigation-bar></navigation-bar>
    <h1>{{ content }}</h1>
  </div>
</template>

<script>
import NavigationBar from '../components/NavigationBar';
import VueHelmet from 'vue-helmet';

export default {
  data() {
    return {
      content: 'index page',
      title: 'index',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
  },
};
</script>
