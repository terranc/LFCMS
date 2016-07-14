<template>
  <div id="app">
    <router-view></router-view>
    <navigation-bar></navigation-bar>
  </div>
</template>

<style lang="scss">
@import '../assets/styles/main.scss';
</style>

<script>
import 'jquery';
import 'weui.js';
import NavigationBar from 'components/navigation-bar';
import store from '../vuex/store';

export default {
  components: {
    NavigationBar,
  },
  store,
};
</script>
