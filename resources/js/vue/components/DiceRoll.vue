<template>
    <div class="mt-3">
        <button class="btn btn-primary" v-on:click="roll20()">Roll d20!</button>    
       
    </div>
</template>

<script>
    export default {
        methods: {
            roll20() {
                axios.get('http://127.0.0.1:8000/api/roll');
            },
        },
    }
</script>

