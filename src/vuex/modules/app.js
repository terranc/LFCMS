import * as types from '../mutation-types';

const state = {
  tabbarState: false,
  alertState: false,
  headTitle: '',
};
const mutations = {
  [types.SHOW_TABBAR](state) {
    state.tabbarState = true;
  },
  [types.HIDE_TABBAR](state) {
    state.tabbarState = false;
  },
  [types.SET_PAGE_TITLE](state, title) {
    state.headTitle = title;
  },
};

export default {
  state,
  mutations,
};
