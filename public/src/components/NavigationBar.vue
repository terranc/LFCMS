<template>
<footer id="NavigationBar">
  <tabbar>
    <tabbar-item v-link="{name: 'index'}" selected>
      <img slot="icon" src="https://o84lhz5xo.qnssl.com/master/src/assets/demo/icon_nav_button.png">
      <span slot="label">Index</span>
    </tabbar-item>
    <tabbar-item show-dot v-link="{name: 'articles'}">
      <img slot="icon" src="https://o84lhz5xo.qnssl.com/master/src/assets/demo/icon_nav_msg.png">
      <span slot="label">Articles</span>
    </tabbar-item>
    <tabbar-item v-link="{name: 'setting'}">
      <img slot="icon" src="https://o84lhz5xo.qnssl.com/master/src/assets/demo/icon_nav_article.png">
      <span slot="label">Setting</span>
    </tabbar-item>
  </tabbar>
</footer>
</template>

<style lang="scss">
@import "../assets/styles/components/NavigationBar.scss";
@import '~vux/dist/vux.css';
</style>

<script>
import Tabbar from 'vux-components/tabbar';
import TabbarItem from 'vux-components/tabbar-item';

export default {
  components: {
    Tabbar,
    TabbarItem,
  },
};
</script>
