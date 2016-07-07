<template>
<tabbar id="navigation-bar">
  <tabbar-item v-link="{name: 'index'}">
    <icon slot="icon" name="home" scale="1.6"></icon>
    <span slot="label">首页</span>
  </tabbar-item>
  <tabbar-item v-link="{name: 'articles'}">
    <icon slot="icon" name="columns" scale="1.6"></icon>
    <span slot="label">文章</span>
  </tabbar-item>
  <tabbar-item v-link="{name: 'setting'}">
    <icon slot="icon" name="cog" scale="1.6"></icon>
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
import Icon from 'vue-awesome';

export default {
  components: {
    Tabbar,
    TabbarItem,
    Icon,
  },
};
</script>
