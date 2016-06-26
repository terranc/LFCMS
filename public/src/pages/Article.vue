<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div>
    <x-header>{{ title }}</x-header>
    <h1>{{ content }}</h1>
    <p>{{ $route.params.id }}</p>
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
      content: 'article page',
      title: `article-${this.$route.params.id}`,
    };
  },
  components: {
    XHeader,
    VueHelmet,
    NavigationBar,
  },
};
</script>
