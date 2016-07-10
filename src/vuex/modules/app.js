import * as types from '../mutation-types';

const state = {
  tabbarState: false,
};
const mutations = {
  [types.SHOW_TABBAR](state) {
    state.tabbarState = true;
  },
  [types.HIDE_TABBAR](state) {
    state.tabbarState = false;
  },
};

export default {
  state,
  mutations,
};
