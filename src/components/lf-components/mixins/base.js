export default {
  created () {
    if (!this.uuid) {
      this.uuid = + new Date();
    }
  },
  methods: {
  },
};
