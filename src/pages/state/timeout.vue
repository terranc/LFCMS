<template>
  <status :message="message" :text="text">
    <a class="weui_btn weui_btn_primary" @click="reload" slot="buttons">重新加载</a>
  </status>
</template>

<style lang="scss">
</style>

<script>
import Status from 'lf-components/status';
export default {
  head: {
    title: {
      inner: '找不到页面',
    },
  },
  data() {
    return {
      message: '请求超时',
      text: '网络异常',
    };
  },
  components: {
    Status,
  },
  methods: {
    reload() {
      this.$route.router.go(window.history.back());
    },
  },
};
</script>
