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

export default {
  components: {
    NavigationBar,
  },
};
</script>
