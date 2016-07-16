<template>
  <component :is="component" class="weui_cell" :class="className" @click="onClick()">
    <slot></slot>
    <div class="weui_cell_ft" v-if="warn">
      <i class="weui_icon_warn"></i>
    </div>
  </component>
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
    href: {
      type: [String, Object],
    },
    htmlFor: Boolean,
    switch: Boolean,
    radio: Boolean,
    select: Boolean,
    checkbox: Boolean,
    selectPos: {
      type: String,
      default: 'after',
    },
    warn: Boolean,
    vcode: Boolean,
  },
  computed: {
    component() {
      if (this.href) {
        return 'CellLink';
      } else if (this.htmlFor || this.radio || this.checkbox) {
        return 'CellLabel';
      }
      return 'CellNormal';
    },
    className() {
      return [
        this.class, 
        {
          'weui_check_label': this.htmlFor || this.radio || this.checkbox || this.$parent.radio || this.$parent.checkbox, 
          'weui_cell_select': this.select, 
          'weui_cell_switch': this.switch,
          'weui_select_before': (this.select && this.selectPos) === 'before',
          'weui_select_after': (this.select && this.selectPos) === 'after',
          'weui_cell_warn': this.warn,
          'weui_vcode': this.vcode,
        },
      ];
    },
  },
  methods: {
    onClick() {
      this.$router.go(this.link, this.$router);
    },
  },
  components: {
    CellLink: { template: '<a><slot></slot></a>' },
    CellNormal: { template: '<div><slot></slot></div>' },
    CellLabel: { template: '<label><slot></slot></label>' },
  },
};
</script>
