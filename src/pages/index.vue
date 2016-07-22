<template>
  <div  class="wrapper" id="index">
    <content-wrapper>
      <h1>{{ content }}</h1>
      <f-icon name="code"></f-icon>
      <h2>当前URL</h2>
      <p>{{ $route.path }}</p>
      <h2>当前query</h2>
      <p>{{ $route.query | json 4 }}</p>
      <h2>当前params</h2>
      <p>{{ $route.params | json 4 }}</p>
      <p>{{ create_time | date '%Y-%m-%d' }}</p>
      <x-button @click="showAlert">adasd</x-button>
    </content-wrapper>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Action from '../vuex/actions';
import ContentWrapper from 'components/vux-extension/content-wrapper';
import store from '../vuex/store';

export default {
  ready() {
    console.log(this.$root.$refs.head);
    store.state.app.headTitle = '首页';
    // this.$root.$refs.head.title = '首页';
    // Action.Head.setTitle('首页');
    Action.Tabbar.show();
  },
  methods: {
    showAlert: () => $.weui.alert('哈哈', { title: '提示' }),
  },
  data() {
    return {
      store,
      content: 'index page',
      create_time: new Date().getTime(),
    };
  },
  components: {
    ContentWrapper,
  },
};
</script>
