<template>
  <div id="app">
    <div class="wrapper">
      <content-wrapper id="wrap">
        <router-view></router-view>
      </content-wrapper>
    </div>
    <navigation-bar :show="tabbarState" keep-alive></navigation-bar>
  </div>
</template>

<style lang="scss">
@import '../assets/styles/main.scss';
</style>

<script>
import NavigationBar from 'components/navigation-bar';
import ContentWrapper from 'lf-components/content-wrapper';
import store from 'src/vuex/store';

export default {
  components: {
    NavigationBar,
    ContentWrapper,
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
