require('./bootstrap');

// vue, store and phaser imports
// window.Vue = require('vue').default;
import Vue from 'vue';
import App from './vue/app.vue';
import store from './store.js';

// create the vue instance
new Vue({
    el: '#app',
    store,
    components: {
        App
    },
    
});

