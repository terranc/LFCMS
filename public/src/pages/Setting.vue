<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div id="setting">
    <main class="main">
      <group class="content" title="I'm group title">
        <cell title="cell" value="hello world" is-link></cell>
        <x-input title="x-input"></x-input>
        <switch title="switch"></switch>
        <x-textarea placeholder="x-textarea"></x-textarea>
        <calendar title="Calendar"></calendar>
      </group>
      <group class="content" title="I'm another group title" title-color="green">
        <cell title="cell" value="hello world" is-link></cell>
        <x-input title="x-input"></x-input>
        <x-number title="x-number"></x-number>
      </group>
      <group class="content" title="I'm group title">
        <cell title="cell" value="hello world" is-link></cell>
        <x-input title="x-input"></x-input>
        <switch title="switch"></switch>
        <x-textarea placeholder="x-textarea"></x-textarea>
        <calendar title="Calendar"></calendar>
      </group>
      <group class="content" title="I'm another group title" title-color="green">
        <cell title="cell" value="hello world" is-link></cell>
        <x-input title="x-input"></x-input>
        <x-number title="x-number"></x-number>
      </group>
    </main>
    <footer class="footer">
      <navigation-bar></navigation-bar>
    </footer>
  </div>
</template>

<style lang="scss">
@import "../assets/styles/lib/flexboxgrid.scss";
@import "../assets/styles/pages/setting.scss";
</style>

<script>
import NavigationBar from 'components/NavigationBar';
import VueHelmet from 'vue-helmet';
import Group from 'vux-components/group';
import Cell from 'vux-components/Cell';
import Switch from 'vux-components/switch';
import XInput from 'vux-components/x-input';
import XNumber from 'vux-components/x-number';
import Calendar from 'vux-components/calendar';
import XTextarea from 'vux-components/x-textarea';

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
    Calendar,
    XNumber,
    XInput,
    Switch,
    Cell,
    Group,
    XTextarea,
  },
};
</script>
