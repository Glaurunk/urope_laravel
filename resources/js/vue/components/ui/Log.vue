<template>
    <div class="template-container">
        <ul>
            <li class="text-warning" v-for="message in this.$store.state.logMessages" :key="message.message">{{ message }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
    
        methods: {
            listenToLogMessages() {
                Echo.channel('log-messages')
                .listen('DiceRoll', (message) => {
                    this.$store.commit('addMessageToLog',message);
                    const logEl = document.getElementById('log-container');
                    logEl.scrollTop = logEl.scrollHeight;
                });
            },
        },
        mounted() {
            this.$store.commit('clearLog');
            this.listenToLogMessages();
        }
    }
</script>
