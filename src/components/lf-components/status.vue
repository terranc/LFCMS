<template>
  <div class="weui_msg">
    <div class="weui_icon_area">
      <slot name="icon">
        <i class="weui_icon_warn weui_icon_msg"></i>
      </slot>
    </div>
    <div class="weui_text_area">
      <h2 class="weui_msg_title">{{ message }}</h2>
      <p class="weui_msg_desc">{{ text }}</p>
    </div>
    <div class="weui_opr_area">
      <p class="weui_btn_area">
        <slot name="buttons">
          <a class="weui_btn weui_btn_primary" @click="reload">确定</a>
        </slot>
      </p>
    </div>
  </div>
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    message: {
      type: String,
      default: '操作失败',
    },
    text: {
      type: String,
    },
  },
  methods: {
    reload() {
      this.$route.router.go(window.history.back());
    },
  },
};
</script>


