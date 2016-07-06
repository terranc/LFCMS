<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div id="index">
    <h1>{{ content }}</h1>
    <icon name="code"></icon>
    <navigation-bar></navigation-bar>
  </div>
</template>

<style lang="scss">
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import Icon from 'vue-awesome';

export default {
  data() {
    $('body').append('<div>test jquery</div>');
    return {
      content: 'index page',
      title: 'index',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Icon,
  },
};
</script>
