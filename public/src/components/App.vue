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
import NavigationBar from 'components/NavigationBar';
import store from '../vuex/store';

export default {
  components: {
    NavigationBar,
  },
  store,
};
</script>
