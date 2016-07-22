<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="notification">
    <main class="main">
      <group>
        <cell title="接收新消息通知" >已开启</cell>
      </group>
      <tip>如果你要关闭或开启微信的新消息通知，请在 iPhone 的“设置”－“通知”功能中，找到应用程序“微信”更改。</tip>
      <group>
        <switch title="通知显示消息详情"></switch>
      </group>
      <tip>
        关闭后，当收到微信消息时，通知提示将不显示发信人和内容摘要。
      </tip>
      <group>
        <cell title="功能消息免打扰" is-link></cell>
      </group>
      <tip>
        设置系统功能消息提示声音和振动的时段。
      </tip>
      <group>
        <switch title="声音"></switch>
        <switch title="震动"></switch>
      </group>
      <tip>
        当微信在运行时，你可以设置是否需要声音或者振动。
      </tip>
      <group>
        <switch title="朋友圈照片更新"></switch>
      </group>
      <tip>
        关闭后，有朋友更新照片时，界面下面的“发现”切换按钮上不再出现红点提示。
      </tip>
    </main>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Group from 'vux-components/group';
import Cell from 'vux-components/cell';
import Switch from 'vux-components/switch';
import Flexbox from 'vux-components/flexbox';
import FlexboxItem from 'vux-components/flexbox-item';
import Tip from 'vux-components/tip';

export default {
  data() {
    return {
      title: '新消息通知',
    };
  },
  components: {
    Group,
    Cell,
    Switch,
    Flexbox,
    FlexboxItem,
    Tip,
  },
};
</script>

