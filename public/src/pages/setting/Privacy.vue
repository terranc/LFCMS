<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="privacy">
    <main class="main main-footer">
      <group title="通讯录">
        <switch title="加我为朋友时需要验证"></switch>
      </group>
      <group>
        <switch title="通过 QQ 号搜索到我"></switch>
      </group>
      <group>
        <switch title="通过微信号搜索到我"></switch>
      </group>
      <x-explanation>
        关闭后，其他用户将不能用微信号搜索到你。
      </x-explanation>
      <group>
        <cell title="通信录黑名单" is-link></cell>
      </group>
      <group title="朋友圈">
        <cell title="不让他（她）看我的朋友圈" is-link></cell>
        <cell title="不看他（她）的朋友圈" is-link></cell>
      </group>
    </main>
    <navigation-bar></navigation-bar>
  </div>
</template>

<style lang="scss">
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import XExplanation from 'components/vux_extension/XExplanation';
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import Switch from 'vux-components/switch';


export default {
  data() {
    return {
      title: '隐私',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Group,
    Cell,
    XExplanation,
    Switch,
  },
};
</script>
