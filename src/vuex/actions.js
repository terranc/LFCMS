import * as types from './mutation-types';
import store from '../vuex/store';

export const LFTabbar = {
  show: () => {
    store.dispatch(types.SHOW_TABBAR);
  },
  hide: () => {
    store.dispatch(types.HIDE_TABBAR);
  },
};

