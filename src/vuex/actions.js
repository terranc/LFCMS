import * as types from './mutation-types';
import store from '../vuex/store';
import 'weui.js';

const actions = {};
actions.Tabbar = {
  show(selected) {
    store.dispatch(types.SHOW_TABBAR, selected);
  },
  hide() {
    store.dispatch(types.HIDE_TABBAR);
  },
  getState() {
    return store.state.app.tabbar.state;
  },
};

actions.List = {
  getScrollTop() {
    return store.state.app.list.scrollTop;
  },
  setScrollTop(top) {
    store.state.app.list.scrollTop = top;
  },
  getData() {
    return store.state.app.list.data;
  },
  setData(data) {
    store.state.app.list.data = data;
  },
  removeData(data) {
    store.state.app.list.data = [];
  },
  getQuery() {
    return store.state.app.list.query;
  },
  setQuery(obj) {
    store.state.app.list.query = obj;
  },
  get() {
    return store.state.app.list;
  },
};

export default actions;

