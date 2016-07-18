<template>
  <div :="attributes" :class="className" :style="style" @scroll="onScroll" v-el:main>
    <slot></slot>
  </div>
</template>

<style lang="scss">
</style>

<script>
import { LFTabbar } from '../../vuex/actions';
export default {
  props: {
    uuid: {
      type: Number,
      default: + new Date(),
    },
    isSaveScrollPosition: {
      type: Boolean,
      default: true,
    },
    saveScrollWhenTo: {
      type: String,
      default: '',
    },
    styles: {
      type: Object,
    },
    attributes: {
      type: Object,
    },
  },
  methods: {
    onScroll(e) {
      this.$emit('on-scroll', e);
    },
    activate(transition) {
      this.$nextTick(() => {
        this.$els.main.scrollTop = sessionStorage[`scrollTop_${this.uuid}`];
      });
    },
    deactivate(transition) {
      if (this.isSaveScrollPosition && this.saveScrollWhenTo.split(',').indexOf(transition.to.name) >= 0) {
        sessionStorage[`scrollTop_${this.uuid}`] = this.$els.main.scrollTop;
      } else {
        sessionStorage.removeItem(`scrollTop_${this.uuid}`);
      }
    },
  },
  computed: {
    className() {
      let className = ['main'];
      if (LFTabbar.getState()) {
        className.push('main-footer');
      }
      return className;
    },
  },
};
</script>

