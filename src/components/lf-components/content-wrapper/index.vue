<template>
  <div :="attributes" :class="className" :style="style" @scroll="onScroll" v-el:main>
    <slot></slot>
  </div>
</template>

<style lang="scss">
</style>

<script>
import Base from 'lf-components/mixins/base';
import Action from 'lf-vuex/actions';
export default {
  props: {
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
  mixins: [Base],
  computed: {
    className() {
      let className = ['main'];
      if (Action.Tabbar.getState()) {
        className.push('main-footer');
      }
      return className;
    },
  },
};
</script>

