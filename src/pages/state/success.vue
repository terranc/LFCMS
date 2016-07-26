<template>
  <status :message="message" :text="text">
    <i class="weui_icon_success weui_icon_msg" slot="icon"></i>
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
      inner: '操作成功',
    },
  },
  data() {
    return {
      message: '操作成功',
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
