<template>
    <div class="template-container">
        <h4>this is the log output component</h4>
        <p>here we log players actions etc</p>
        <DiceRoll />
    </div>
</template>

<script>
import DiceRoll from './DiceRoll'

export default {
    components: {
        DiceRoll
    },
}
</script>