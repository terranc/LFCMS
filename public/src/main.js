import Vue from 'vue';
import VueRouter from 'vue-router';
import routerMap from './routes';


Vue.use(VueRouter);
const router = new VueRouter({
  hashbang: true,
  history: false,
  saveScrollPosition: true,
  transitionOnLoad: true,
});
routerMap(router);

const App = Vue.extend({});
router.start(App, '#app');
