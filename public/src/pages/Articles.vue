<template>
  <vue-helmet :title='title' v-ref:head></vue-helmet>
  <div id="articles">
    <navigation-bar></navigation-bar>
    <h1>{{ content }}</h1>
    <div>
      <ul>
        <li><a href="" v-link="{name: 'article', params: {id: '1'}}">1</a></li>
        <li><a href="" v-link="{name: 'article', params: {id: '2'}}">2</a></li>
        <li><a href="" v-link="{name: 'article', params: {id: '3'}}">3</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
import NavigationBar from '../components/NavigationBar';
import VueHelmet from 'vue-helmet';

export default {
  data() {
    return {
      content: 'articles page',
      title: 'articles',
    };
  },
  components: {
    VueHelmet,
    NavigationBar,
  },
};
</script>
