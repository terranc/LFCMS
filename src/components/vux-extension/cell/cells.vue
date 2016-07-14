<template>
  <div class="weui_cells" :class="[class, {'weui_cells_access': access, 'weui_cells_checkbox': checkbox, 'weui_cells_radio': radio, 'weui_cells_form': form }]">
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
};
</script>
