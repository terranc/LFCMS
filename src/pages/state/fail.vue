<template>
  <div class="weui_msg">
    <div class="weui_icon_area"><i class="weui_icon_warn weui_icon_msg"></i></div>
    <div class="weui_text_area">
      <h2 class="weui_msg_title">{{ message }}</h2>
      <p class="weui_msg_desc">{{ detail }}</p>
    </div>
    <div class="weui_opr_area">
      <p class="weui_btn_area">
        <a class="weui_btn weui_btn_primary" v-if="hasConfirm" v-link="redirectWhenConfirm">确定</a>
        <a class="weui_btn weui_btn_default" v-if="hasCancel" v-link="redirectWhenCancel">取消</a>
      </p>
    </div>
  </div>
</template>

<style lang="scss">
</style>

<script>
import querystring from 'querystring';

export default {
  props: {
    message: {
      type: String,
      default() {
        return this.$route.query.message || '操作失败';
      },
    },
    text: {
      type: String,
      default() {
        return this.$route.query.text || '';
      },
    },
    hasConfirm: {
      type: Boolean,
      default() {
        return this.$route.query.hasConfirm ? this.$route.query.hasConfirm === '1' : true;
      },
    },
    hasCancel: {
      type: Boolean,
      default() {
        return this.$route.query.hasCancel ? this.$route.query.hasCancel === '1' : true;
      },
    },
    redirectWhenConfirm: {
      type: Object,
      default() {
        return this.$route.query.redirectWhenConfirm ? querystring.parse(this.$route.query.redirectWhenConfirm) : '';
      },
    },
    redirectWhenCancel: {
      type: Object,
      default() {
        return this.$route.query.redirectWhenCancel ? querystring.parse(this.$route.query.redirectWhenCancel) : '';
      },
    },
  },
};
</script>

