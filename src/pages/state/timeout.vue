<template>
  <div class="weui_msg">
    <div class="weui_icon_area"><i class="weui_icon_warn weui_icon_msg"></i></div>
    <div class="weui_text_area">
      <h2 class="weui_msg_title">网络异常</h2>
      <p class="weui_msg_desc">数据请求超时</p>
    </div>
    <div class="weui_opr_area">
      <p class="weui_btn_area">
        <x-button type="primary" @click="reload">返回重试</x-button> 
      </p>
    </div>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Status from 'components/status';

export default {
  head: {
    title: {
      inner: '网络异常',
    },
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
