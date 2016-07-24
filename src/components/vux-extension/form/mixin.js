export default {
  created () {
    this.$on('toggle-input-warn', (val, elname) => {
      if (this.$els.input.name && this.$els.input.name === elname) {
        this.$dispatch('toggle-cell-warn', val);
      }
      this.$dispatch('toggle-cells-form', true);
    });
  },
};
