import * as types from '../mutation-types';

const state = {
  tabbarState: false,
};
const mutations = {
  [types.SET_TABBAR_STATE](state, value) {
    state.tabbarState = value;
  },
};

export default {
  state,
  mutations,
};
