/* eslint global-require:off */
export default function (router) {
  router.map({
    '/index': {
      name: 'index',
      component: (resolve) => {
        require(['./pages/Index'], resolve);
      },
    },
    '/setting': {
      name: 'setting',
      component: (resolve) => {
        require(['./pages/setting/Index'], resolve);
      },
    },
    '/setting/account': {
      name: 'account',
      component: (resolve) => {
        require(['./pages/setting/Account'], resolve);
      },
    },
    '/setting/notification': {
      name: 'notification',
      component: (resolve) => {
        require(['./pages/setting/Notification'], resolve);
      },
    },
    '/setting/privacy': {
      name: 'privacy',
      component: (resolve) => {
        require(['./pages/setting/Privacy'], resolve);
      },
    },
    '/setting/general': {
      name: 'general',
      component: (resolve) => {
        require(['./pages/setting/General'], resolve);
      },
    },
    '/articles': {
      name: 'articles',
      component: (resolve) => {
        require(['./pages/Articles'], resolve);
      },
    },
    '/articles/:id': {
      name: 'article',
      component: (resolve) => {
        require(['./pages/Article'], resolve);
      },
    },
    '/timeout': {
      name: 'timeout',
      component: (resolve) => {
        require(['./pages/Timeout'], resolve);
      },
    },
  });

  router.redirect({
    '/': 'index',
  });
}
