import * as types from './mutation-types';
import store from '../vuex/store';

export const showTabbar = () => {
  store.dispatch(types.SET_TABBAR_STATE, true);
};
export const hideTabbar = () => {
  store.dispatch(types.SET_TABBAR_STATE, false);
};

