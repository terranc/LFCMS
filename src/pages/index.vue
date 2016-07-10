<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
    <main class="main main-footer">
      <h1>{{ content }}</h1>
      <icon name="code"></icon>
      <h2>当前URL</h2>
      <p>{{ $route.path }}</p>
      <h2>当前query</h2>
      <p>{{ $route.query | json 4 }}</p>
      <h2>当前params</h2>
      <p>{{ $route.params | json 4 }}</p>
    </main>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Icon from 'vue-awesome';
import { LFTabbar } from '../vuex/actions';

export default {
  data() {
    LFTabbar.show();
    return {
      content: 'index page',
      title: 'index',
    };
  },
  components: {
    VueHelmet,
    Icon,
  },
};
</script>
