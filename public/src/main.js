/* global __DEV__ */
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import routerMap from './routes';
import App from './components/App';
import store from './vuex/store';
import { sync } from 'vuex-router-sync';
import { Tabbar } from './vuex/actions';

if (__DEV__) {
  window.VueDev = Vue;
}

Vue.use(VueRouter);
Vue.use(VueResource);

const router = new VueRouter({
  hashbang: true,
  history: true,
  abstract: false,
  saveScrollPosition: true,
  transitionOnLoad: true,
});
sync(store, router);
routerMap(router);

// 请求失败
Vue.http.interceptors.push((request, next) => {
  next((response) => {
    if (response.status === 0) {
      router.go({ name: 'timeout' });
    }
  });
});

router.beforeEach(({ next }) => {
  Tabbar.hide();
  next();
});
router.start(App, 'app');
