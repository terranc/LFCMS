<template>
  <vue-helmet title='index'></vue-helmet>
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
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
  },
};
</script>
