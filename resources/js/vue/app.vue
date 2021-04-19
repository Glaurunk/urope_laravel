<template>
    <div id="game-container" class="container">
        <div id="party-tab">
            <PartyTab />
        </div>
        <div id="map-container">
            <Map />
        </div>
        <div id="log-container">
            <Log />
        </div>
    </div>
</template>

<script>
    import Map from './components/Map'
    import Log from './components/Log'
    import PartyTab from './components/PartyTab'

    export default {
            components: {
                Map,
                Log,
                PartyTab,
            }, 
            methods: {
                fetchCharacters() {
                    axios.get('http://127.0.0.1:8000/api/data', {
                
                    })
                    .then((response) => {
                        this.$store.state.characters = response.data;
                        //console.log(response);
                    })
                    .catch((error) => { 
                       console.log(error);
                    });
                }
            }, 
            mounted() {
                this.fetchCharacters();
            },  
        }
</script>

<style>
    #party-tab {
        background-color: burlywood;
    }
    #game-container {
        background-color: aliceblue;
    }

    #map-container {
        height: 600px;
        background-color: antiquewhite;
    }

    #log-container {
        background-color: #17181b;
        height: 200px;
        color: white;
        padding: 1rem;
        
    }
</style>
