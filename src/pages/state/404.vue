<template>
  <vue-helmet :title='404' v-ref:head></vue-helmet>
  <h1>404</h1>
</template>

<style lang="scss">
</style>


<script>
export default {
  head: {
    title: {
      inner: '404',
    },
  },
};
</script>
