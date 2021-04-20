<template>
    <div class="">           
        <h2>Party Pane</h2>
        <div class="row p-0">
            <div class="character-card" 
            v-for="character in this.$store.state.characters" :key="character.id" 
            v-bind:style="{ backgroundImage: `url(${ character.image})` }">
                <div class="card-footer">{{ character.name }}</div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
  
}
</script>

<style scoped>
    .character-card {
        height: 150px;
        width: 100px;
        margin-right: 1rem;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 1rem;
        position: relative;
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
