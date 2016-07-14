/* eslint global-require:off */
export default function (router) {
  router.map({
    '/index': {
      name: 'index',
      data: {
        tabbarState: true,
      },
      component: (resolve) => {
        require(['./pages/index'], resolve);
      },
    },
    '/setting': {
      name: 'setting',
      data: {
        tabbarState: true,
      },
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
    '/setting/info': {
      name: 'userinfo',
      component: (resolve) => {
        require(['./pages/setting/user-info'], resolve);
      },
    },
    '/articles': {
      name: 'articles',
      data: {
        tabbarState: true,
      },
      component: (resolve) => {
        require(['./pages/articles'], resolve);
      },
    },
    '/articles/:id': {
      name: 'article',
      component: (resolve) => {
        require(['./pages/article'], resolve);
      },
    },
    '/signup': {
      name: 'signup',
      component: (resolve) => {
        require(['./pages/signup'], resolve);
      },
    },
    '/timeout': {
      name: 'timeout',
      component: (resolve) => {
        require(['./pages/timeout'], resolve);
      },
    },
  });

  router.redirect({
    '/': 'index',
  });
}
