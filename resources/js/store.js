import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

// use the store before creating it
Vue.use(Vuex);
// create the store
export default new Vuex.Store({    
    state: {
        characters: [],
    }
});
