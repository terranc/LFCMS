import Vue from 'vue';
import Vuex from 'vuex';
import createLogger from 'vuex/logger';

import app from './modules/app';

Vue.use(Vuex);

const middlewares = [];

if (window.VueDev) {
  middlewares.push(createLogger());
}

const store = new Vuex.Store({
  modules: {
    app,
  },
  middlewares,
});

if (module.hot) {
  module.hot.accept([
    './modules/app',
  ], () => {
    try {
      store.hotUpdate({
        modules: {
          app: app.default,
        },
      });
    } catch (e) {
      console.log(e.stack);
    }
  });
}


export default store;
