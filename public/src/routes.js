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
    '/article': {
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
