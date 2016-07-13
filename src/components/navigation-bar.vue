<template>
<tabbar id="navigation-bar" v-show="tabbarState">
  <tabbar-item v-link="{name: 'index'}" :selected="selected === 'home'">
    <icon slot="icon" name="home" scale="1.6"></icon>
    <span slot="label">首页</span>
  </tabbar-item>
  <tabbar-item v-link="{name: 'articles'}" :selected="selected === 'article'">
    <icon slot="icon" name="columns" scale="1.6"></icon>
    <span slot="label">文章</span>
  </tabbar-item>
  <tabbar-item v-link="{name: 'signup'}" :selected="selected === 'sugnup'">
    <icon slot="icon" name="user-plus" scale="1.6"></icon>
    <span slot="label">注册</span>
  </tabbar-item>
  <tabbar-item v-link="{name: 'setting'}" :selected="selected === 'settings'">
    <icon slot="icon" name="cog" scale="1.6"></icon>
    <span slot="label">设置</span>
  </tabbar-item>
</tabbar>
</template>

<style lang="scss">
@import "../assets/styles/components/navigation-bar.scss";
</style>

<script>
import Tabbar from 'vux-components/tabbar';
import TabbarItem from 'vux-components/tabbar-item';
import Icon from 'vue-awesome';
import store from '../vuex/store';

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
    Icon,
  },
  vuex: {
    getters: {
      tabbarState: (state) => state.app.tabbarState,
    },
  },
  data() {
    return {
      store,
    };
  },
};
</script>
