export default [
  {
    name: 'Group',
    module: require('vux-components/group'),
  },
  {
    name: 'Cell',
    module: require('vux-components/cell'),
  },
  {
    name: 'Checklist',
    module: require('vux-components/checklist'),
  },
  {
    name: 'Radio',
    module: require('vux-components/radio'),
  },
  {
    name: 'Selector',
    module: require('vux-components/selector'),
  },
  {
    name: 'Switch',
    module: require('vux-components/switch'),
  },
  {
    name: 'XButton',
    module: require('vux-components/x-button'),
  },
  {
    name: 'XInput',
    module: require('vux-components/x-input'),
  },
  {
    name: 'XTextarea',
    module: require('vux-components/x-textarea'),
  },
  {
    name: 'Flexbox',
    module: require('vux-components/flexbox'),
  },
  {
    name: 'Icon',
    module: require('vux-components/icon'),
  },
  {
    name: 'Panel',
    module: require('vux-components/panel'),
  },
  {
    name: 'Tab',
    module: require('vux-components/tab'),
  },
  {
    name: 'XImg',
    module: require('vux-components/x-img'),
  },
  {
    name: 'Card',
    module: require('vux-components/card'),
  },
  {
    name: 'Actionsheet',
    module: (resolve) => {
      require(['vux-components/actionsheet'], resolve);
    },
  },
  {
    name: 'Spinner',
    module: (resolve) => {
      require(['vux-components/spinner'], resolve);
    },
  },
  {
    name: 'Confirm',
    module: (resolve) => {
      require(['vux-components/confirm'], resolve);
    },
  },
  {
    name: 'Dialog',
    module: (resolve) => {
      require(['vux-components/dialog'], resolve);
    },
  },
  {
    name: 'Loading',
    module: (resolve) => {
      require(['vux-components/loading'], resolve);
    },
  },
  {
    name: 'Alert',
    module: (resolve) => {
      require(['vux-components/alert'], resolve);
    },
  },
  {
    name: 'Datetime',
    module: (resolve) => {
      require(['vux-components/datetime'], resolve);
    },
  },
  {
    name: 'Toast',
    module: (resolve) => {
      require(['vux-components/toast'], resolve);
    },
  },
  {
    name: 'Address',
    module: (resolve) => {
      require(['vux-components/address'], resolve);
    },
  },
  {
    name: 'FIcon',
    module: (resolve) => {
      require(['vue-awesome'], resolve);
    },
  },
];
