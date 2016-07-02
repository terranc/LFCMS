<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="account">
    <main class="main main-footer">
      <group>
        <cell title="微信号" >sugarlamb</cell>
      </group>
      <group>
        <cell title="QQ 号" is-link>10000</cell>
        <cell title="手机号" is-link>13322029282</cell>
        <cell title="邮箱地址" is-link>10000@qq.com</cell>
      </group>
      <group>
        <cell title="声音锁" is-link></cell>
        <cell title="微信密码" is-link></cell>
        <cell title="账号保护" is-link><i class="weui_icon_warn"></i>未保护</cell>
        <cell title="安全中心" is-link></cell>
      </group>
    </main>
    <navigation-bar></navigation-bar>
  </div>
</template>

<style lang="scss">
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';


export default {
  data() {
    return {
      title: '账号与安全',
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
