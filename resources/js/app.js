require('./bootstrap');

window.Vue = require('vue');
require('./asset/dashboard')

//axios global configuration
axios.defaults.baseURL = '/api/admin';
axios.defaults.headers.post['Content-Type'] = 'application/json';

Vue.component('addroles', require('./components/addroles.vue').default);
Vue.component('allroles', require('./components/allroles.vue').default);
const app = new Vue({
    el: '#app'
});

