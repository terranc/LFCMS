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
    '/jqueryweui': {
      name: 'jqueryweui',
      component: (resolve) => {
        require(['./pages/jquery-weui'], resolve);
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
