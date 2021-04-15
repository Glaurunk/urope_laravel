require('./bootstrap');

window.Vue = require('vue').default;

import App from './vue/app.vue'

const app = new Vue({
    el: '#app',
    components: {
        App
    }
});
