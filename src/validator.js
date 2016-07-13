// import Vue from 'vue';
import VueValidator from 'vue-form-validator';

// Vue.use(VueValidator);

VueValidator.addRule('repassword', (value, input, param) => {
  let data;
  if (document.querySelector(param).value !== value) {
    data = {
      valid: false,
      msg: '密码不一致',
    };
  } else {
    data = {
      valid: true,
      msg: '',
    };
  }
  return data;
});

export default VueValidator;
