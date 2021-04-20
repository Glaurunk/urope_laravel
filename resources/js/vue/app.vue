<template>
    <div id="game-container" class="container">
        <div id="party-tab">
            <PartyTab />
        </div>
        <div id="map-container">
            <Map />
        </div>
        <div id="clearlog">
            <h4 class="p-0 m-0">Log</h4>
            <ClearLog />
        </div>
        <div id="log-container">
            <Log />
        </div>
        <DiceRoll />

    </div>
</template>

<script>
    import Map from './components/Map'
    import Log from './components/Log'
    import PartyTab from './components/PartyTab'
    import DiceRoll from './components/DiceRoll'
    import ClearLog from './components/ClearLog'

    export default {
// on mounted the module dispatches an async action to the store for loading the characters from the db        
            components: {
                Map,
                Log,
                PartyTab,
                DiceRoll,
                ClearLog
            }, 
            methods: {
                callFetchCharacters() {
                    this.$store.dispatch('fetchCharacters');
                }
            }, 
            mounted() {
                this.callFetchCharacters();
            },  
        }
</script>

<style>
    #party-tab {
        background-color: burlywood;
        padding: 1rem 1rem 2rem 2rem;
    }
    #game-container {
        background-color: aliceblue;
        padding: 0;
    }

    #map-container {
        padding: 1rem;
        height: 600px;
        background-color: antiquewhite;
    }
    #clearlog {
        position: relative;
        color: white;
        background-color:#17181b;
        padding:    1rem;
    }
    #log-container {
        background-color: #17181b;
        height: 200px;
        color: white;
        padding: 1rem;
        overflow-y: scroll;
    }
    /* width */
    #log-container::-webkit-scrollbar {
    width: 10px;
    }

    /* Track */
    #log-container::-webkit-scrollbar-track {
    background:#17181b;
    }

    /* Handle */
    #log-container::-webkit-scrollbar-thumb {
        background:#ffed4b;
        transition: .5s;
    }

    /* Handle on hover */
    #log-container::-webkit-scrollbar-thumb:hover {
        background:orange;
        transition: .5s;
        cursor: pointer;
    }
    
</style>
