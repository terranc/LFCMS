<template>
  <div :class="class" v-el:main @scroll="onScroll">
    <slot></slot>
  </div>
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    uuid: {
      type: Number,
      default: + new Date(),
    },
    isSaveScrollPosition: {
      type: Boolean,
      default() {
        return true;
      },
    },
    saveScrollWhenTo: {
      type: String,
      default() {
        return '';
      },
    },
    class: {
      type: String,
      default() {
        return '';
      },
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
};
</script>

