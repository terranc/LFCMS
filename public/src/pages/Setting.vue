<template>
  <vue-helmet title='setting'></vue-helmet>
  <div id="setting">
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
      content: 'setting page',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
  },
};
</script>
