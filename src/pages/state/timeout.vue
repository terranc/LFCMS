<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <status :message="message" :text="text">
    <a class="weui_btn weui_btn_primary" @click="reload" slot="buttons">重新加载</a>
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
      title: '悲剧啦',
      message: '请求超时',
      text: '',
    };
  },
  components: {
    VueHelmet,
    Status,
  },
  methods: {
    reload() {
      this.$route.router.go(window.history.back());
    },
  },
};
</script>
