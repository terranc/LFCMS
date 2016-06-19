<template>
  <div id="setting">
    <navigation-bar></navigation-bar>
    <h1>{{ content }}</h1>
  </div>
</template>

<script>
import NavigationBar from '../components/NavigationBar';

export default {
  data() {
    return {
      content: 'setting page',
    };
  },
  components: {
    NavigationBar,
  },
};
</script>
