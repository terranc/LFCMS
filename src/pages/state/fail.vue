<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <status :message="message" :text="text">
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
      title: '失败',
      message: '操作失败',
      text: '密码错误',
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

