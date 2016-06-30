import Vue from 'vue';
import VueRouter from 'vue-router';
import routerMap from './routes';
import App from './components/App';


Vue.use(VueRouter);
const router = new VueRouter({
  hashbang: true,
  history: true,
  abstract: false,
  saveScrollPosition: true,
  transitionOnLoad: true,
});
routerMap(router);

router.start(App, 'app');
