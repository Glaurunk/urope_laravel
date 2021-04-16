<template>
    <div class="">           
        <h2>Party Pane</h2>
        <p>The party consists of {{ characters }} characters</p>
    </div>
</template>

<script>

export default {
  computed: {
       characters() {
           return this.$store.state.characters.length; 
       }
     },
}
</script>
