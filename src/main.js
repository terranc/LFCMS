/* global __DEV__ */
if (__DEV__) {
  window.VueDev = Vue;
}
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import VueTouch from 'vue-touch';
import routerMap from './routes';
import App from './components/app';
import store from './vuex/store';
import { sync } from 'vuex-router-sync';
import Filters from './filter';
import modules from './modules';  // 常用组件加载
import VueHead from 'vue-head';
import 'weui.js';

modules.forEach((component) => {
  Vue.component(component.name, component.module);
});
import VueFilter from 'vue-filter';
// register filters 自定义过滤器
window.Vue = Vue;
Vue.config.devtools = true;

Object.keys(Filters).forEach((k) => {
  Vue.filter(k, Filters[k]);
});
Vue.use(VueFilter);
Vue.use(VueHead, {
  separator: '',
  complement: '',
});
Vue.use(VueTouch);
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

router.start(App, 'app');
export default Vue;
