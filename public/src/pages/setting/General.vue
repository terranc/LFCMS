<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="general">
    <main class="main main-footer">
      <group>
        <cell title="多语言" is-link></cell>
      </group>
      <group>
        <cell title="字体大小" is-link></cell>
        <cell title="聊天背景" is-link></cell>
        <cell title="我的表情" is-link></cell>
        <cell title="朋友圈小视频" is-link></cell>
      </group>
      <group>
        <switch title="听筒模式"></switch>
      </group>
      <group>
        <cell title="功能" is-link></cell>
      </group>
      <group>
        <cell title="聊天记录迁移" is-link></cell>
        <cell title="清理微信存储空间" is-link></cell>
      </group>
      <group>
        <cell class="text-center" title="清空聊天记录" is-link></cell>
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
import Cell from 'vux-components/Cell';
import Switch from 'vux-components/switch';


export default {
  data() {
    return {
      title: '通用',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Group,
    Cell,
    Switch,
  },
};
</script>
