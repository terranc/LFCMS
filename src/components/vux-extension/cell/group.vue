<template>
  <group-title v-if="title">{{ title }}</group-title>
  <div class="weui_cells" :class="className" :style="style">
    <slot></slot>
  </div>
  <group-tips v-if="tips">{{ tips }}</group-tips>
</template>

<style lang="scss">
</style>

<script>
import GroupTitle from './group-title.vue';
import GroupTips from './group-tips.vue';

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
  created() {
    this.$on('group:toggle-form', (val) => {
      this.form = val;
    });
    this.$on('group:toggle-select', (val) => {
      this.select = val;
    });
    this.$on('group:toggle-switch', (val) => {
      this.switch = val;
    });
    this.$on('group:toggle-radio', (val) => {
      this.radio = val;
    });
    this.$on('group:toggle-checkbox', (val) => {
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
  components: {
    GroupTitle,
    GroupTips,
  },
};
</script>
