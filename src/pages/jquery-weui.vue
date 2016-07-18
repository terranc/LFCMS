<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div  class="wrapper" id="index">
  <validator name="test">
    <form class="main" @submit="onSubmit" novalidate>
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
     
      <group>
        <datetime 
          title="选择时间"
          :min-year=2000 
          :max-year=2016
          :value.sync="time"><i class="weui_icon_warn" v-if="$test.time.invalid"></i></datetime>
        <input type="text" :value.sync="time" 
          v-validate:time="{required: { rule: true, message: '请选择时间' }}" style="display: none;">
      </group>
      <div class="weui_btn_area">
        <button class="weui_btn weui_btn_primary"> 保存 </button>
      </div>
    </form>
  </validator>
  <Toptips v-ref:toptips>{{ errorInfo }}</Toptips>
  </div>
</template>

<style lang="scss">
</style>

<script>
import VueHelmet from 'vue-helmet';
import Datetime from 'vux-components/datetime';
import Group from 'vux-components/group';
import Validator from 'vue-validator';
import Toptips from 'vux-extension/toptips';

// https://github.com/lihongxun945/jquery-weui/issues/224
import 'jquery-weui/dist/js/jquery-weui';
export default {
  ready() {
  },
  data() {
    return {
      title: 'popup',
      time: '',
      errorInfo: '',
    };
  },
  components: {
    VueHelmet,
    Group,
    Datetime,
    Validator,
    Toptips,
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
    onSubmit(e) {
      this.$validate();
      if (this.$test.errors != null) {
        for (const error of this.$test.errors) {
          this.$refs.toptips.show = true;
          this.errorInfo = error.message;
          e.preventDefault();
          return;
        }
      }
      this.$refs.toptips.show = false;
      this.errorInfo = '';     
    },
  },
};
</script>
