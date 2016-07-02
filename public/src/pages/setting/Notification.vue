<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="wrapper" id="notification">
    <main class="main main-footer">
      <group>
        <cell title="接收新消息通知" >已开启</cell>
      </group>
      <x-explanation>
        如果你要关闭或开启微信的新消息通知，请在 iPhone 的“设置”－“通知”功能中，找到应用程序“微信”更改。
      </x-explanation>
      <group>
        <switch title="通知显示消息详情"></switch>
      </group>
      <x-explanation>
        关闭后，当收到微信消息时，通知提示将不显示发信人和内容摘要。
      </x-explanation>
      <group>
        <cell title="功能消息免打扰" is-link></cell>
      </group>
      <x-explanation>
        设置系统功能消息提示声音和振动的时段。
      </x-explanation>
      <group>
        <switch title="声音"></switch>
        <switch title="震动"></switch>
      </group>
      <x-explanation>
        当微信在运行时，你可以设置是否需要声音或者振动。
      </x-explanation>
      <group>
        <switch title="朋友圈照片更新"></switch>
      </group>
      <x-explanation>
        关闭后，有朋友更新照片时，界面下面的“发现”切换按钮上不再出现红点提示。
      </x-explanation>
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
import Cell from 'vux-components/Cell';
import Switch from 'vux-components/switch';
import Flexbox from 'vux-components/flexbox';
import FlexboxItem from 'vux-components/flexbox-item';

export default {
  data() {
    return {
      title: '新消息通知',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
    Group,
    Cell,
    Switch,
    Flexbox,
    FlexboxItem,
    XExplanation,
  },
};
</script>

