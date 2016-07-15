export default (Vue) => {
  Vue.validator('repassword', (value, input, param) => {
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

  Vue.validator('cellphone', {
    message: '请输入 11 位大陆手机号码',
    check: (value) => /^((13[0-9])|(15[0-9])|(18[0-9])|(17[0-9]))\d{8}$/.test(value + ''),
  });

  Vue.validator('email', {
    message: '请输正确的邮箱地址',
    check: (value) => /[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?/.test(value),
  });
};
