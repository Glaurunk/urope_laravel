import Vue from 'vue';
import Vuex from 'vuex';

// use the store before creating it
Vue.use(Vuex);
// create the store
export default new Vuex.Store({    
    state: {
        characters: [],
        logMessages: [],
    },
    mutations: {
        clearLog(state) {
            state.logMessages = [];
        },
        addMessageToLog(state, message) {
            state.logMessages.push(message.message);
        },
        fetchCharacters(state) {
            axios.get('http://127.0.0.1:8000/api/data')
            .then((response) => {
                state.characters = response.data;
            })
            .catch((error) => { 
                console.log(error);
            });
        },
    },
    actions: {
        fetchCharacters(context) {
            context.commit('fetchCharacters');
        }
    },
    getters: {
        getCharacter: (state) => (id) => {
            return state.characters.find(char => {
                return char.id === id
            });
        }
    }
});
