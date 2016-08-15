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
  getScrollTop(uuid) {
    if (!store.state.app.list[uuid]) store.state.app.list[uuid] = {};
    return store.state.app.list[uuid]['scrollTop'];
  },
  setScrollTop(uuid, top) {
    store.state.app.list[uuid]['scrollTop'] = top;
  },
  removeScrollTop(uuid) {
    delete store.state.app.list[uuid]['scrollTop'];
  },
  getData(uuid) {
    if (!store.state.app.list[uuid]) store.state.app.list[uuid] = {};
    return store.state.app.list[uuid]['data'];
  },
  setData(uuid, data) {
    store.state.app.list[uuid]['data'] = data;
  },
  removeData(uuid) {
    console.log(uuid);
    store.state.app.list[uuid]['data'] = [];
  },
  getQuery(uuid) {
    if (!store.state.app.list[uuid]) store.state.app.list[uuid] = {};
    return store.state.app.list[uuid]['query'];
  },
  setQuery(uuid, obj) {
    store.state.app.list[uuid]['query'] = obj;
  },
  removeQuery(uuid) {
    delete store.state.app.list[uuid]['query'];
  },
  get(uuid) {
    if (!store.state.app.list[uuid]) store.state.app.list[uuid] = {};
    return store.state.app.list[uuid];
  },
  remove() {},
};

export default actions;

