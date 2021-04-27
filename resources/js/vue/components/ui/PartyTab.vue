<template>
    <div class="">           
        <h2>Party Pane</h2>
        <div class="row p-0">
            <div class="character-card" 
                v-for="character in this.$store.state.characters" 
                :key="character.id" 
            >
                <div class="card-image"
                    v-bind:style="{ backgroundImage: `url(${ (character.image).split(',')[0] })` }"
                    draggable="true"
                    v-on:dragstart="startDrag($event,character)"
                    v-bind:id="`character-${character.name}`"
                    data-type='party-tab-item'
                ></div>
                <div class="card-footer">{{ character.name }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
   methods: {
       startDrag(evt,character) {
            evt.dataTransfer.dropEffect = 'move';
            evt.dataTransfer.effectAllowed = 'move';
            evt.dataTransfer.setData('creatureType', 'pc');
            evt.dataTransfer.setData('creatureId', character.id);
            evt.dataTransfer.setData('sourceTileId', evt.target.id);
       },
   }
}
</script>

<style scoped>
    .character-card {
        position: relative;
    }
    .card-image {
        height: 150px;
        width: 100px;
        margin-right: 1rem;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 1rem;
    }   
    .card-footer {
        background-color: transparent;
        position: absolute;
        bottom: -2.5rem;
        font-weight: bold;
        width: 100%;
        text-align: center;
    }
</style>
