<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div id="setting">
    <main class="main">
      <group class="content">
        <cell title="账号与安全" is-link></cell>
      </group>
      <group class="content">
        <cell title="新消息通知" is-link></cell>
        <cell title="隐私" is-link></cell>
        <cell title="通用" is-link></cell>
      </group>
      <group class="content">
        <cell title="帮助与反馈" is-link></cell>
        <cell title="关于微信" is-link></cell>
      </group>
      <group class="content">
        <cell title="退出登录" is-link></cell>
      </group>
    </main>
    <navigation-bar></navigation-bar>
  </div>
</template>

<style lang="scss">
@import "../assets/styles/pages/setting.scss";
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/Cell';


export default {
  data() {
    return {
      content: 'setting page',
      title: 'setting',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Group,
    Cell,
  },
};
</script>
