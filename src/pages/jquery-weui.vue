<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
    <main class="main">
      <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary" @click="showWeuiAlert"> weui.js Alert </button>
      </div>

      <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary" @click="showWeuiComfirm"> weui.js Comfirm </button>
      </div>

      <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary" @click="showJQWeuiAlert"> jquery-weui.js Alert </button>
      </div>

      <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary" @click="showJQWeuiComfirm"> jquery-weui.js Comfirm </button>
      </div>
    </main>
  </div>
</template>

<style lang="scss">
</style>

<script>
// https://github.com/lihongxun945/jquery-weui/issues/224
import 'jquery-weui/dist/js/jquery-weui';
export default {
  ready() {
  },
  data() {
    return {
      title: 'popup',
    };
  },
  components: {
  },
  methods: {
    showWeuiAlert() {
      $.weui.alert('weuijs alert');
    },
    showWeuiComfirm() {
      $.weui.confirm('weuijs confirm');
    },
    showJQWeuiAlert() {
      $.alert('jquery weui alert');
    },
    showJQWeuiComfirm() {
      $.confirm('jquery weui confirm');   
    },
  },
};
</script>
