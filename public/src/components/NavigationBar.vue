<template>
<tabbar id="NavigationBar">
  <tabbar-item v-link="{name: 'index'}">
    <img slot="icon" src="https://o84lhz5xo.qnssl.com/master/src/assets/demo/icon_nav_button.png">
    <span slot="label">首页</span>
  </tabbar-item>
  <tabbar-item v-link="{name: 'articles'}">
    <img slot="icon" src="https://o84lhz5xo.qnssl.com/master/src/assets/demo/icon_nav_msg.png">
    <span slot="label">文章</span>
  </tabbar-item>
  <tabbar-item v-link="{name: 'setting'}">
    <img slot="icon" src="https://o84lhz5xo.qnssl.com/master/src/assets/demo/icon_nav_article.png">
    <span slot="label">设置</span>
  </tabbar-item>
</tabbar>
</template>

<style lang="scss">
@import "../assets/styles/components/NavigationBar.scss";
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
