import * as types from '../mutation-types';

const state = {
  tabbar: {
    state: false,
  },
  list: {
    data: [],
    scrollTop: 0,
    query: {},
  },
};
const mutations = {
  [types.SHOW_TABBAR](state) {
    state.tabbar.state = true;
  },
  [types.HIDE_TABBAR](state) {
    state.tabbar.state = false;
  },
};

export default {
  state,
  mutations,
};
