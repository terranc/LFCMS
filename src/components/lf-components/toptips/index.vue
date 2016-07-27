<template>
  <div v-if="show" class="weui_toptips" :transition="transition" :class="toggleClass">
    <slot></slot>
  </div>
</template>

<style lang="scss">
.weui_toptips{
  display: block;
  transform: translateY(0%);
}
.vux-slide-down-transition{
  transition: transform linear 0.2s
}
.vux-slide-down-enter, .vux-slide-down-leave{
  transform: translateY(-100%);
}
</style>

<script>
import Base from './base';
export default {
  props: {
    show: {
      type: Boolean,
      default: false,
    },
    time: {
      type: Number,
      default: 3000,
    },
    type: {
      type: String,
      default: 'warn',
    },
    transition: {
      type: String,
      default: 'vux-slide-down',
    },
  },
  computed: {
    toggleClass() {
      return {
        weui_warn: this.type === 'warn',
        weui_success: this.type === 'success',
      };
    },
  },
  mixins: [Base],
  watch: {
    show(val) {
      if (val) {
        clearTimeout(this.timeout);
        this.timeout = setTimeout(() => {
          this.show = false;
        }, this.time);
      }
    },
  },
};
</script>
