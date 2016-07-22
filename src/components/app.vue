<template>
  <div id="app">
    <vue-helmet :title="headTitle" v-ref:head></vue-helmet>
    <router-view></router-view>
    <navigation-bar v-if="tabbarState"></navigation-bar>
  </div>
</template>

<style lang="scss">
@import '../assets/styles/main.scss';
</style>

<script>
import VueHelmet from 'vue-helmet';
import NavigationBar from 'components/navigation-bar';
import store from '../vuex/store';

export default {
  components: {
    VueHelmet,
    NavigationBar,
  },
  vuex: {
    getters: {
      tabbarState: (state) => state.app.tabbarState,
    },
  },
  computed: {
    headTitle: store.state.app.headTitle,
  },
  store,
};
</script>
