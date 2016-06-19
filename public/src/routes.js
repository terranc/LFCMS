import Index from './pages/Index';
import Article from './pages/Article';
import Setting from './pages/Setting';

export default function (router) {
  router.map({
    '/index': {
      name: 'index',
      component: Index,
    },
    '/setting': {
      name: 'setting',
      component: Setting,
    },
    '/article': {
      name: 'article',
      component: Article,
    },
  });
}
