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
        require(['./pages/Setting'], resolve);
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
  });

  router.redirect({
    '/': 'index',
  });
}
