import Vue from 'vue';
import VueRouter from 'vue-router';
// import App from './App';
import routerMap from './routes';


Vue.use(VueRouter);
const router = new VueRouter({
  hashbang: true,
  history: false,
  saveScrollPosition: true,
  transitionOnLoad: true,
});
routerMap(router);
router.start(Vue.extend({}), 'body');

/* eslint-disable no-new */
// new Vue({
//   el: 'body',
//   components: { App },
// });
