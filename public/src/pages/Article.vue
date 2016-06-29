<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div>
    <h1>{{ content }}</h1>
    <p>{{ $route.params.id }}</p>
    <navigation-bar></navigation-bar>
  </div>
</template>

<style lang="scss">
@import '~vux/dist/vux.css';
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';

export default {
  data() {
    return {
      content: 'article page',
      title: `article-${this.$route.params.id}`,
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
  },
};
</script>
