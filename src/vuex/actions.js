import * as types from './mutation-types';
import store from '../vuex/store';
import 'weui.js';

const actions = {};
actions.Tabbar = {
  show() {
    store.dispatch(types.SHOW_TABBAR);
  },
  hide() {
    store.dispatch(types.HIDE_TABBAR);
  },
  getState() {
    return store.state.app.tabbarState;
  },
};

actions.Validator = {
  showWarn() {
    
  },
  hideWarn() {

  },
};

export default actions;

