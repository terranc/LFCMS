<template>
  <div class="weui_cells" :class="className">
    <slot></slot>
  </div>
</template>

<style type="scss">
</style>

<script>
export default {
  props: {
    access: Boolean,
    radio: Boolean,
    form: Boolean,
    checkbox: Boolean,
    switch: Boolean,
    class: String,
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
