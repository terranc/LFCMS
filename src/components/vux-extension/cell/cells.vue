<template>
  <div class="weui_cells" :class="className">
    <slot></slot>
  </div>
</template>

<style lang="scss">
</style>

<script>
export default {
  props: {
    access: {
      type: Boolean,
    },
    radio: {
      type: Boolean,
    },
    form: {
      type: Boolean,
    },
    checkbox: {
      type: Boolean,
    },
    switch: {
      type: Boolean,
    },
    class: String,
  },
  created() {
    this.$on('cells:toggle-form', (val) => {
      this.form = val;
    });
    this.$on('cells:toggle-select', (val) => {
      this.select = val;
    });
    this.$on('cells:toggle-switch', (val) => {
      this.switch = val;
    });
    this.$on('cells:toggle-radio', (val) => {
      this.radio = val;
    });
    this.$on('cells:toggle-checkbox', (val) => {
      this.checkbox = val;
    });
  },
  computed: {
    className() {
      return [
        this.class, 
        {
          'weui_cells_access': this.access, 
          'weui_cells_checkbox': this.checkbox, 
          'weui_cells_radio': this.radio,
          'weui_cells_form': this.form,
        },
      ];
    },
  },
};
</script>
