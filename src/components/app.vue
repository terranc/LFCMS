<template>
  <div id="app">
    <router-view v-ref:view keep-alive></router-view>
    <navigation-bar v-if="tabbarState" keep-alive></navigation-bar>
  </div>
</template>

<style lang="scss">
@import '../assets/styles/main.scss';
</style>

<script>
import NavigationBar from 'components/navigation-bar';
import store from 'src/vuex/store';

export default {
  components: {
    NavigationBar,
  },
  route: {
    canReuse: false,
  },
  vuex: {
    getters: {
      tabbarState: (state) => state.app.tabbar.state,
    },
  },
  store,
};
</script>
