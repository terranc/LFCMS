import * as types from '../mutation-types';

const state = {
  tabbar: {
    state: false,
    selected: '',
  },
  list: {
    data: [],
    scrollTop: 0,
    query: {},
  },
};
const mutations = {
  [types.SHOW_TABBAR](state, selected) {
    state.tabbar.state = true;
    state.tabbar.selected = selected;
  },
  [types.HIDE_TABBAR](state) {
    state.tabbar.state = false;
  },
};

export default {
  state,
  mutations,
};
