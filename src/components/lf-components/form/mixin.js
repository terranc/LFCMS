export default {
  created () {
    this.$on('toggle-input-warn', (val, elname) => {
      if (this.$els.input && this.$els.input.name && this.$els.input.name === elname) {
        this.$dispatch('cell:toggle-warn', val);
      }
      this.$dispatch('cells:toggle-form', true);
    });
  },
};
