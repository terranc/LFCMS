import * as types from './mutation-types';
import store from '../vuex/store';

const actions = {};
actions.Tabbar = {
  show: () => {
    store.dispatch(types.SHOW_TABBAR);
  },
  hide: () => {
    store.dispatch(types.HIDE_TABBAR);
  },
  getState: () => {
    return store.state.app.tabbarState;
  },
};
actions.Head = {
  setTitle: (title) => {
    store.dispatch(types.SET_PAGE_TITLE, title);
  },
};


export default actions;

