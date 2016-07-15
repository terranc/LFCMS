/* global __DEV__ */
if (__DEV__) {
  window.VueDev = Vue;
}
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import VueValidator from 'vue-validator';
import addRulesOfValidator from './validator';
import routerMap from './routes';
import App from './components/app';
import store from './vuex/store';
import { sync } from 'vuex-router-sync';
import { LFTabbar } from './vuex/actions';
import Filters from './filter';

import VueFilter from 'vue-filter';
// register filters 自定义过滤器
Object.keys(Filters).forEach((k) => {
  Vue.filter(k, Filters[k]);
});
Vue.use(VueFilter);


Vue.use(VueValidator);
addRulesOfValidator(Vue);
Vue.use(VueRouter);
Vue.use(VueResource);

const router = new VueRouter({
  hashbang: true,
  history: false,
  abstract: false,
  saveScrollPosition: true,
  transitionOnLoad: false,
  linkActiveClass: 'active',  // 链接活跃时附带的class
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

router.afterEach(() => {
  LFTabbar.hide();
});
router.start(App, 'app');

export default Vue;
