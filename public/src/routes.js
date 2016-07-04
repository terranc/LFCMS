import Index from 'pages/Index';
import Setting from 'pages/setting/Index';
import Account from 'pages/setting/Account';
import Notification from 'pages/setting/Notification';
import Privacy from 'pages/setting/Privacy';
import General from 'pages/setting/General';
import Articles from 'pages/Articles';
import Article from 'pages/Article';
import Timeout from 'pages/Timeout';

/* eslint global-require:off */
export default function (router) {
  router.map({
    '/index': {
      name: 'index',
      component: (resolve) => {
        resolve(Index);
      },
    },
    '/setting': {
      name: 'setting',
      component: (resolve) => {
        resolve(Setting);
      },
    },
    '/setting/account': {
      name: 'account',
      component: (resolve) => {
        resolve(Account);
      },
    },
    '/setting/notification': {
      name: 'notification',
      component: (resolve) => {
        resolve(Notification);
      },
    },
    '/setting/privacy': {
      name: 'privacy',
      component: (resolve) => {
        resolve(Privacy);
      },
    },
    '/setting/general': {
      name: 'general',
      component: (resolve) => {
        resolve(General);
      },
    },
    '/articles': {
      name: 'articles',
      component: (resolve) => {
        resolve(Articles);
      },
    },
    '/articles/:id': {
      name: 'article',
      component: (resolve) => {
        resolve(Article);
      },
    },
    '/timeout': {
      name: 'timeout',
      component: (resolve) => {
        resolve(Timeout);
      },
    },
  });

  router.redirect({
    '/': 'index',
  });
}
