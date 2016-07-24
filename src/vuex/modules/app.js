import * as types from '../mutation-types';

const state = {
  tabbarState: false,
  alertState: false,
  formElements: {},
};
const mutations = {
  [types.SHOW_TABBAR](state) {
    state.tabbarState = true;
  },
  [types.HIDE_TABBAR](state) {
    state.tabbarState = false;
  },
  [types.SHOW_CELL_WARN](state, cell) {
    // formElements[cell]
  },
  [types.HIDE_CELL_WARN](state) {
  },
};

export default {
  state,
  mutations,
};
