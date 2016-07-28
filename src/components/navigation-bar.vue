<template>
  <tabbar id="navigation-bar">
    <tabbar-item v-link="{name: 'index'}" :selected="selected === 'home'">
      <f-icon slot="icon" name="home" scale="1.6"></f-icon>
      <span slot="label">首页</span>
    </tabbar-item>
    <tabbar-item v-link="{name: 'articles'}" :selected="selected === 'article'">
      <f-icon slot="icon" name="columns" scale="1.6"></f-icon>
      <span slot="label">文章</span>
    </tabbar-item>
    <tabbar-item v-link="{name: 'form'}" :selected="selected === 'form'">
      <f-icon slot="icon" name="user-plus" scale="1.6"></f-icon>
      <span slot="label">表单</span>
    </tabbar-item>
    <tabbar-item v-link="{name: 'setting'}" :selected="selected === 'settings'">
      <f-icon slot="icon" name="cog" scale="1.6"></f-icon>
      <span slot="label">设置</span>
    </tabbar-item>
  </tabbar>
</template>

<style lang="scss">
// @import "../assets/styles/components/navigation-bar.scss";
</style>

<script>
import { Tabbar, TabbarItem } from 'vux-components/tabbar';
import FIcon from 'vue-awesome';
import store from 'src/vuex/store';

export default {
  props: {
    selected: {
      type: String,
      required: false,
      default() {
        return 'home';
      },
    },
  },
  components: {
    Tabbar,
    TabbarItem,
    FIcon,
  },
  ready() {
  },
  attached() {
    if (store.state.app.tabbar.selected) {
      this.selected = store.state.app.tabbar.selected;
    }
  },
};
</script>
