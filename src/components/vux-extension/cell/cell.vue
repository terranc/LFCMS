<template>
  <component :is="component" class="weui_cell" :class="className" @click="onClick()">
    <cell-header v-if="hasHeader"><slot name="header"></slot></cell-header>
    <cell-body v-if="hasBody"><slot name="body"></slot></cell-body>
    <slot></slot>
    <cell-footer v-if="!warn && hasFooter"><slot name="footer"></slot></cell-footer>
    <cell-footer v-if="warn || vcode">
      <i class="weui_icon_warn" v-if="warn"></i>
      <img :src="vcode" v-if="vcode" />
    </cell-footer>
  </component>
</template>

<style lang="scss">
</style>

<script>
import CellHeader from './cell-header.vue';
import CellBody from './cell-body.vue';
import CellFooter from './cell-footer.vue';
export default {
  props: {
    href: {
      type: [String, Object],
    },
    htmlFor: {
      type: Boolean,
      coerce: (val) => !!val,
    },
    switch: {
      type: Boolean,
      coerce: (val) => !!val,
    },
    radio: {
      type: Boolean,
      coerce: (val) => !!val,
    },
    select: {
      type: Boolean,
      coerce: (val) => !!val,
    },
    checkbox: {
      type: Boolean,
      coerce: (val) => !!val,
    },
    selectPos: {
      type: String,
      default: 'after',
    },
    warn: Boolean,
    vcode: String,
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
          'weui_check_label': this.htmlFor || this.radio || this.checkbox, 
          'weui_cell_select': this.select, 
          'weui_cell_switch': this.switch,
          'weui_select_before': (this.select && this.selectPos) === 'before',
          'weui_select_after': (this.select && this.selectPos) === 'after',
          'weui_cell_warn': this.warn,
          'weui_vcode': this.vcode,
        },
      ];
    },
    hasHeader() {
      return !!this._slotContents.header;
    },
    hasBody() {
      return !!this._slotContents.body;
    },
    hasFooter() {
      return !!this._slotContents.footer;
    },
  },
  methods: {
    onClick() {
      this.$router.go(this.href, this.$router);
    },
  },
  components: {
    CellLink: { template: '<a><slot></slot></a>' },
    CellNormal: { template: '<div><slot></slot></div>' },
    CellLabel: { template: '<label><slot></slot></label>' },
    CellHeader,
    CellFooter,
    CellBody,
  },
};
</script>
