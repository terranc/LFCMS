export default {
  // 格式化成友好的时间
  friendlyTime: (time) => {
    if (!time) return '-';
    time = new Date(time * 10000);
    var delta = parseInt((new Date() - time) / 1000, 10);
    if (delta <= 3) return '刚刚';
    var minutes = delta / 60;
    if (minutes < 1) return delta + '秒前';
    var hours = minutes / 60;
    if (hours < 1) return parseInt(minutes, 10) + '分钟前';
    var days = hours / 24;
    if (days < 1) return '今天' + [hours, minutes].join(':');
    var date = time.getDate();
    if (date < 10) date = '0' + date;
    var year = time.getFullYear();
    var month = time.getMonth();
    if (month < 10) month = '0' + month;
    if (year !== (new Date()).getFullYear()) {
      return [time.getFullYear(), month, date].join('-') + ' ' + [hours, minutes].join(':');
    } else {
      return [month, date].join('-') + ' ' + [hours, minutes].join(':');
    }
  },

  // 将链接转换成 A 标签
  urlize: (text) => {
    if (!text) return '';
    var pattern = /https?:\/\/[^\s<]+[^<.,:;"')\]\s]/g;
    return text.replace(pattern, function(u) {
      var t = u.replace('http://', '');
      return '<a href="' + u + '">' + t + '</a>';
    });
  },

  // 转化上传图片的路径
  getUploadUrl: (url) => {
    // TODO 待完善
    return url;
  },
};
