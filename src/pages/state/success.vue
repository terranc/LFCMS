<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <status :message="message" :text="text">
    <i class="weui_icon_success weui_icon_msg" slot="icon"></i>
    <a class="weui_btn weui_btn_primary" @click="back" slot="buttons">回到首页</a>
  </status>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Status from 'components/status';

export default {
  data() {
    return {
      title: '成功',
      message: '操作成功',
      text: '您的订单已经成功生成',
    };
  },
  components: {
    VueHelmet,
    Status,
  },
  methods: {
    back() {
      this.$route.router.go('index');
    },
  },
};
</script>
