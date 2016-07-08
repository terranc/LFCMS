<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div div class="wrapper" id="timeout">
    <main class="main main-footer">
      <tip>请求超时</tip>
      <x-button type="primary" @click="reload">重新加载</x-button> 
    </main>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import XButton from 'vux-components/x-button';
import Tip from 'vux-components/tip';

export default {
  data() {
    return {
      title: '悲剧啦',
    };
  },
  components: {
    VueHelmet,
    XButton,
    Tip,
  },
  methods: {
    reload() {
      this.$route.router.go(window.history.back());
    },
  },
};
</script>
