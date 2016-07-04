import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import routerMap from './routes';
import App from './components/App';

Vue.use(VueRouter);
Vue.use(VueResource);

const router = new VueRouter({
  hashbang: true,
  history: true,
  abstract: false,
  saveScrollPosition: true,
  transitionOnLoad: true,
});
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
