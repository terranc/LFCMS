<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div class="weui_msg">
    <div class="weui_icon_area"><i class="weui_icon_warn weui_icon_msg"></i></div>
    <div class="weui_text_area">
      <h2 class="weui_msg_title">{{ message }}</h2>
      <p class="weui_msg_desc">{{ detail }}</p>
    </div>
    <div class="weui_opr_area">
      <p class="weui_btn_area">
        <a class="weui_btn weui_btn_primary" @click="reload">重新加载</a>
      </p>
    </div>
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
      message: '请求超时',
      detail: '',
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
