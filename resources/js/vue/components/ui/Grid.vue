<template>   
<div id="map" ref="map" class="map-container">
    <div class="row justify-content-center mb-5">
        <label for="map-size">map size: </label>
        <div class="form-group m-0">
            <select v-model="selected" 
                    class="form-control ml-2" 
                    name="mapSize" 
                    id="map-size"
                    v-on:change="applyClassToGrid()">
                <option value="25">small</option>
                <option value="30">medium</option>
                <option value="80">large</option>
                <option value="100">extra large</option>
            </select>    
        </div>
    </div>
<!-- -the grid container size is managed by css grid classes-->  
    <div class="grid-container small">
<!-- each tile is bound to a drop event. Their nymber is decided by the class/variable applied to the parent grid element -->
        <div class="grid-item" 
            :ref="`tile-${index}`"
            data-type="tile"
            v-for="(item,index) in selectedToInt"
            :key="index"
            v-bind:id="`tile-${index}`"
            v-on:drop="onDrop($event)"
            v-on:dragover.prevent
            v-on:dragenter.prevent
            v-on:dragstart="startDrag($event)"
            v-on:click="toggleRadialMenu($event)"
        >
        </div>
        <div id="radial"
            v-bind:style="`left: ${radialLeft};top:${radialTop}`">
            <RadialMenu />
        </div>
    </div>
</div>
</template>


<script>
import RadialMenu from './RadialMenu'

export default {
    components: {
        RadialMenu
    },
    data() {
        return {
            selected : 25,
            dragCharacter : '',
            BGimage : '',
            characters : [],
            targetDivId : '',
            sourceDivId : '',
            tileClicked : false,
            radialLeft : '500px',
            radialTop : '500px'
        }
    },
    computed: {
        selectedToInt() {
            return parseInt(this.selected);
        },
    },
    mounted() {
        this.characters = this.$store.dispatch('fetchCharacters');
        this.listenToActions();
        this.addRadialPositionProperties();
    },
    methods: {
        listenToActions() {
            Echo.channel('actions')
            .listen('MoveCreature', (message) => {
           // get the character using the getCharacter store getter and passing the id from the dataTrasfer object
                this.dragCharacter = this.$store.getters.getCharacter(parseInt(message.creatureId));
            // get the square portrait of the character
                this.BGimage = "url('" + this.dragCharacter.image.split(',')[1] + "')";
            // get the target tile Id
                this.targetDivId = message.targetId;
            // get the source tile Id    
                this.sourceDivId = message.sourceId;
            // remove the portrait from other tiles and reset them
                const gridItems = document.getElementsByClassName('grid-item');
                const otherInstances = Array.from(gridItems).filter(item => {
                    return item.dataset.characterid == this.dragCharacter.id
                });
                otherInstances.forEach(instance => {
                    instance.style.backgroundImage='';
                    instance.dataset.characterid = '';
                    instance.setAttribute('draggable','false');
                });
            // set the portrait of the character as bg to the current tile
                const targetDiv = document.getElementById(this.targetDivId);
                targetDiv.style.backgroundImage=this.BGimage;
            //  also set to target data properties and classes if applicable               
                targetDiv.dataset.characterid = this.dragCharacter.id;
                targetDiv.setAttribute('draggable','true');
                targetDiv.classList.add('isOccupied');
            // remove also the class from the source tile
                const sourceDiv = document.getElementById(this.sourceDivId);
                sourceDiv.classList.remove('isOccupied');
            });
        },
        applyClassToGrid() {
// gets a value from a select input and switches it to apply classes to the grid container el            
            const parentDiv = document.querySelector('.grid-container');
            switch(this.selected) {
                case '25':
                  parentDiv.className = 'grid-container';
                  parentDiv.classList.add('small');  
                  break;
                case '30':
                    parentDiv.className = 'grid-container';
                    parentDiv.classList.add('medium');  
                    break;
                case '80':
                    parentDiv.className = 'grid-container';
                    parentDiv.classList.add('large');  
                    break;
                case '100':
                    parentDiv.className = 'grid-container';
                    parentDiv.classList.add('xlarge');  
                    break;
                default:
                    parentDiv.className = 'grid-container';
                    parentDiv.classList.add('small');  
                    break;
            }
        },
        onDrop(evt) {
// perform a call for a moeve event to the api passing creature type, creature id and target tile id  
            const creatureType = evt.dataTransfer.getData('creatureType');
            const creaturerId = evt.dataTransfer.getData('creatureId');
            const targetId = evt.target.id;
            const sourceId = evt.dataTransfer.getData('sourceTileId');
            axios.get(`http://127.0.0.1:8000/api/move/${ creatureType }/${ creaturerId }/${ targetId }/${ sourceId }`);
        },
// when dragging from a drop zone repeat the drag process but get the id from the characterid data attribute        
        startDrag(evt) {
            const characterId = evt.srcElement.dataset.characterid;
            evt.dataTransfer.dropEffect = 'move';
            evt.dataTransfer.effectAllowed = 'move';
            evt.dataTransfer.setData('creatureType', 'pc');
            evt.dataTransfer.setData('creatureId', characterId);
            evt.dataTransfer.setData('sourceTileId', evt.target.id);
       },
// check if the clicked tile is occupied and if the radial menu is already open       
       toggleRadialMenu(evt) {
           if (evt.target.classList.contains('isOccupied')) {
                document.querySelector('.circle').classList.toggle('open');
              //  const radial = document.getElementById('radial');
              //  const tile = parseInt((evt.target.id.substr(5)));
               // console.log(tile);
                this.radialLeft = evt.target.dataset.left;
                this.radialTop = evt.target.dataset.top;
                //console.log(evt);          
                 } 
       },
// calculate the radials absolute position for each tile depending on the grid size
        addRadialPositionProperties() {
            const tiles = Array.from(document.getElementsByClassName('grid-item'));
            switch(this.selected) {
                case '25':
                    tiles.forEach(tile => {
                        let id = parseInt(tile.id.substr(5));
// calculate top                        
                        if (id >=0 && id <5) {
                            tile.dataset.top = '-75px';
                        } else if (id >= 5 && id <10 ) {
                            tile.dataset.top = '25px';
                        } else if (id >= 10 && id <15 ) {
                            tile.dataset.top = '125px';
                        } else if (id >= 15 && id <20 ) {
                            tile.dataset.top = '225px';
                        } else {
                            tile.dataset.top = '325px';
                        }
// calculate left            
                        if (id%5 === 0) {
                            tile.dataset.left = '-75px';
                        } else if (id%5 === 1 ) {
                            tile.dataset.left = '25px';
                        } else if (id%5 === 2 ) {
                            tile.dataset.left = '125px';
                        } else if (id%5 === 3 ) {
                            tile.dataset.left = '225px';
                        } else {
                            tile.dataset.left = '325px';
                        }            
                    });
                    break;
                default:
                    tiles.forEach(tile => {
                        let id = parseInt(tile.id.substr(5));
                        if (id >=0 && id <5) {
                            tile.dataset.top = '-75px';
                        } else if (id >= 5 && id <10 ) {
                            tile.dataset.top = '25px';
                        } else if (id >= 10 && id <15 ) {
                            tile.dataset.top = '125px';
                        } else if (id >= 15 && id <20 ) {
                            tile.dataset.top = '225px';
                        } else {
                            tile.dataset.top = '325px';
                        }
                        if (id%5 === 0) {
                            tile.dataset.left = '-75px';
                        } else if (id%5 === 1 ) {
                            tile.dataset.left = '25px';
                        } else if (id%5 === 2 ) {
                            tile.dataset.left = '125px';
                        } else if (id%5 === 3 ) {
                            tile.dataset.left = '225px';
                        } else {
                            tile.dataset.left = '325px';
                        }            
                    });
                    break;
            }
        }       
    },
}
</script>


<style scoped>
    label {
        align-self: center;
        margin: 0;
    }
    
</style>
