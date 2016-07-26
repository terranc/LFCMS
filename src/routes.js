/* eslint global-require:off */
export default function (router) {
  router.map({
    '/index': {
      name: 'index',
      component: (resolve) => {
        require(['./pages/index'], resolve);
      },
    },
    '/setting': {
      name: 'setting',
      component: (resolve) => {
        require(['./pages/setting/index'], resolve);
      },
    },
    '/setting/account': {
      name: 'account',
      component: (resolve) => {
        require(['./pages/setting/account'], resolve);
      },
    },
    '/setting/notification': {
      name: 'notification',
      component: (resolve) => {
        require(['./pages/setting/notification'], resolve);
      },
    },
    '/setting/privacy': {
      name: 'privacy',
      component: (resolve) => {
        require(['./pages/setting/privacy'], resolve);
      },
    },
    '/setting/general': {
      name: 'general',
      component: (resolve) => {
        require(['./pages/setting/general'], resolve);
      },
    },
    '/articles': {
      name: 'articles',
      keepAlive: true,
      component: (resolve) => {
        require(['./pages/articles'], resolve);
      },
    },
    '/articles2': {
      name: 'articles2',
      keepAlive: true,
      component: (resolve) => {
        require(['./pages/articles2'], resolve);
      },
    },
    '/articles/:id': {
      name: 'article',
      component: (resolve) => {
        require(['./pages/article'], resolve);
      },
    },
    '/form': {
      name: 'form',
      component: (resolve) => {
        require(['./pages/form'], resolve);
      },
    },
    '/timeout': {
      name: 'timeout',
      component: (resolve) => {
        require(['./pages/state/timeout'], resolve);
      },
    },
    '/success': {
      name: 'success',
      component: (resolve) => {
        require(['./pages/state/success'], resolve);
      },
    },
    '/fail': {
      name: 'fail',
      component: (resolve) => {
        require(['./pages/state/fail'], resolve);
      },
    },
    '*': {
      name: '404',
      component: (resolve) => {
        require(['./pages/state/404'], resolve);
      },
    },
  });

  router.redirect({
    '/': 'index',
  });
}
