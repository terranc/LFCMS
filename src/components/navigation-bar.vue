<template>
  <tabbar id="navigation-bar" v-show="show">
    <tabbar-item v-link="{name: 'index'}" :selected="selected === 'home'">
      <i class="material-icons" slot="icon">home</i>
      <span slot="label">首页</span>
    </tabbar-item>
    <tabbar-item v-link="{name: 'articles'}" :selected="selected === 'article'">
      <i class="material-icons" slot="icon">list</i>
      <span slot="label">文章</span>
    </tabbar-item>
    <tabbar-item v-link="{name: 'form'}" :selected="selected === 'form'">
      <i class="material-icons" slot="icon">storage</i>
      <span slot="label">表单</span>
    </tabbar-item>
    <tabbar-item v-link="{name: 'setting'}" :selected="selected === 'settings'">
      <i class="material-icons" slot="icon">apps</i>
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
    show: [String, Boolean],
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
