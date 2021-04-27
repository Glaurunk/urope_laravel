<template>
<!-- Here goes the phaser instance -->
    <div id="map" ref="map" class="map-container">
        <h1 class="text-center">this is the map component</h1>
    </div>
</template>
  

<script>
import Phaser from "phaser"

export default {
    mounted() {
        const characters = this.$store.state.characters;
        return new Phaser.Game({
            type: Phaser.AUTO,
            parent: 'map',
            scale: Phaser.Scale.FIT,
            width: '100%',
            height: 600,
            scene: {
                preload() {
                    characters.forEach(character => {
                        this.load.image(character.name, character.image.split(',')[1]);
                    });
                },
                create() {
                    
                    this.add.grid(100, 100, 2100, 1200, 50, 50, 0xffffff);
                    const oxus = this.add.image(25,75,'Oxus');
                    oxus.setScale(0.1);
                },
                update() {
                    
                }
            },
        })
    },
} // end export
</script>
