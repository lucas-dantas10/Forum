require('./bootstrap');

window.Vue = require('vue');

import store from './vuex/store';

Vue.component('notifications', require('./components/Notification/Notifications.vue').default);
Vue.component('notification', require('./components/Notification/Notification.vue').default);
Vue.component('heart', require('./components/Heart/Heart.vue').default);

const app = new Vue({
    store,
    el: '#app'
});
