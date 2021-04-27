<template>
    <div class="clear-btn">
        <a id="clear-btn" href="#" role="button" class="text-danger" v-on:click.prevent="callClearLog()">clear log</a>
    </div>
</template>

<script>
    export default {
        methods: {
            callClearLog() {
                this.$store.commit('clearLog');
            }
        } 
    }
</script>

<style scoped>
    .clear-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
    }
</style>
