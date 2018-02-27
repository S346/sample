window.Vue = require('vue');

Vue.component('calender', require('./components/calender.vue'));

const app = new Vue({
    el: '#app'
});
