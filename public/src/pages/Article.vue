<template>
  <vue-helmet title='article'></vue-helmet>
  <div id="article">
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
      content: 'article page',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
  },
};
</script>
