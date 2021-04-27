<template>
    <div id="game-container" class="container">
        <div id="party-tab">
            <PartyTab />
        </div>
        <div id="map-container">
            <!-- <Map /> -->
            <Grid />
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
    //import Map from './components/ui/Map'
    import Log from './components/ui/Log'
    import PartyTab from './components/ui/PartyTab'
    import DiceRoll from './components/game/actions/DiceRoll'
    import ClearLog from './components/ui/ClearLog'
    import Grid from './components/ui/Grid'

    export default {
// on mounted the module dispatches an async action to the store for loading the characters from the db        
            components: {
   //             Map,
                Log,
                PartyTab,
                DiceRoll,
                ClearLog,
                Grid
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
        padding: 1rem 0;
        background-color: antiquewhite;
        position: relative;
    }
    
    
</style>
