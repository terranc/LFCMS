<template>
  <cells-title v-if="title">{{ title }}</cells-title>
  <div class="weui_cells" :class="className" :style="style">
    <slot></slot>
  </div>
  <cells-tips v-if="tips">{{ tips }}</cells-tips>
</template>

<script>
import CellsTitle from './cells-title.vue';
import CellsTips from './cells-tips.vue';
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
    style: String,
    title: String,
    tips: String,
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
  components: {
    CellsTitle,
    CellsTips,
  },
};
</script>
