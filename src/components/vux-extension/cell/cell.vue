<template>
  <component :is="component" class="weui_cell" :class="className" @click="onClick()" v-el:cell v-ref:cell>
    <cell-header v-if="hasHeader"><slot name="header"></slot></cell-header>
    <cell-body v-if="hasBody"><slot name="body"></slot></cell-body>
    <slot></slot>
    <cell-footer v-if="!warn && hasFooter"><slot name="footer"></slot></cell-footer>
    <cell-footer v-if="warn || vcode || href">
      <i class="weui_icon_warn" v-if="warn"></i>
      <img :src="vcode" v-if="vcode" />
    </cell-footer>
  </component>
</template>

<script>
import Base from '../base';
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
  mixins: [Base],
  detached() {
    delete this.$els.cell.vm;
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
    hasHeader() {
      return 'header' in this._slotContents;
    },
    hasBody() {
      return 'body' in this._slotContents;
    },
    hasFooter() {
      return 'footer' in this._slotContents;
    },
  },
  created() {
    this.$on('cell:toggle-warn', (val, elname) => {
      if (elname) {
        this.$broadcast('toggle-input-warn', val, elname);
      } else {
        this.warn = val;
      }
    });
    this.$on('cell:toggle-select', (val) => {
      this.select = val;
    });
    this.$on('cell:toggle-switch', (val) => {
      this.switch = val;
    });
    this.$on('cell:toggle-radio', (val) => {
      this.radio = val;
    });
    this.$on('cell:toggle-checkbox', (val) => {
      this.checkbox = val;
    });
    if (this.href) {
      this.$parent.access = true;
    }
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
