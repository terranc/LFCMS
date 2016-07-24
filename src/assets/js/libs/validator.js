import 'form-serializer';
import 'nice-validator/dist/local/zh-CN';
import 'weui.js';

$.validator.config({
  debug: false,
  timely: 1,
  rules: {
    digits: [/^\d+$/, '请输入数字'],
    letters: [/^[a-z]+$/i, '请输入字母'],
    date: [/^\d{4}-\d{2}-\d{2}$/, '请输入有效的日期，格式:yyyy-mm-dd'],
    time: [/^([01]\d|2[0-3])(:[0-5]\d){1,2}$/, '请输入有效的时间，00:00到23:59之间'],
    email: [/^[\w\+\-]+(\.[\w\+\-]+)*@[a-z\d\-]+(\.[a-z\d\-]+)*\.([a-z]{2,4})$/i, '请输入有效的邮箱'],
    url: [/^(https?|s?ftp):\/\/\S+$/i, '请输入有效的网址'],
    qq: [/^[1-9]\d{4,}$/, '请输入有效的QQ号'],
    IDcard: [/^\d{6}(19|2\d)?\d{2}(0[1-9]|1[012])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)?$/, '请输入正确的身份证号码'],
    tel: [/^(?:(?:0\d{2,3}[\- ]?[1-9]\d{6,7})|(?:[48]00[\- ]?[1-9]\d{6}))$/, '请输入有效的电话号码'],
    mobile: [/^((13[0-9])|(15[0-9])|(18[0-9])|(17[0-9]))\d{8}$/, '请输入正确的大陆手机号码'],
    zipcode: [/^\d{6}$/, '请检查邮政编码格式'],
    chinese: [/^[\u0391-\uFFE5]+$/, '请输入中文字符'],
    username: [/^\w{3,12}$/, '请输入3-12位数字、字母、下划线'],
    realname: [/^[\w\u0391-\uFFE5]{2,12}$/, '请输入2-12位字符'],
    password: [/^[\S]{6,20}$/, '请输入6-20位字符，不能包含空格'],
    'float': [/^(-?\d+)(\.\d+)?$/, '请输入正确的数值'],
    accept: function (element, params) {
      if (!params) return true;
      const ext = params[0];
      let value = $(element).val();
      return (ext === '*') ||
        (new RegExp('.(?:' + ext + ')$', 'i')).test(value) ||
        this.renderMsg('只接受{1}后缀的文件', ext.replace(/\|/g, ','));
    },
  },
  stopOnError: false,
  focusInvalid: true,
  showOk: false,
  ignore: ':hidden',
  target: [],
  display: (elem) => {
    return $(elem).closest('.weui_cell').children('.weui_cell_hd').text();
  },
  validation(el, result) {
    if (result.isValid) {
      this.options.vm.$broadcast('toggle-cell-warn', false, el.name);
    } else {
      this.options.vm.$broadcast('toggle-cell-warn', true, el.name);
    }
  },
  invalid(form, errors) {
    $.weui.topTips(errors[0]);
  },
});
