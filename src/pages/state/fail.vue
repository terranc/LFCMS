<template>
  <status :message="message" :text="text">
    <a class="weui_btn weui_btn_primary" @click="back" slot="buttons">回到首页</a>
  </status>
</template>

<style lang="scss">
</style>

<script>
import Status from 'lf-components/status';
export default {
  head: {
    title: {
      inner: '失败',
    },
  },
  data() {
    return {
      message: '操作失败',
    };
  },
  components: {
    Status,
  },
  methods: {
    back() {
      this.$route.router.go('index');
    },
  },
};
</script>
