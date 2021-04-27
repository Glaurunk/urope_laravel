<template>
    <div id="radial">
        <nav class="circular-menu">
            <div class="circle">
                <a href="" class="fa fa-home fa-2x"></a>
                <a href="" class="fa fa-facebook fa-2x"></a>
                <a href="" class="fa fa-twitter fa-2x"></a>
                <a href="" class="fa fa-linkedin fa-2x"></a>
                <a href="" class="fa fa-github fa-2x"></a>
                <a href="" class="fa fa-rss fa-2x"></a>
                <a href="" class="fa fa-pinterest fa-2x"></a>
                <a href="" class="fa fa-asterisk fa-2x"></a>
            </div>
  
  <!-- <a href="" class="menu-button fa fa-bars fa-2x"></a> -->

</nav>
    </div>
</template>

<script>
export default {
    methods : {
        createMenu() {
            const items = document.querySelectorAll('.circle a');
            for(let i = 0, l = items.length; i < l; i++) {
                items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
                items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
            }           
            // document.querySelector('.menu-button').onclick = function(e) {
            // e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
            // }
        }
    },
    mounted() {
        this.createMenu();
    },
}
</script>

<style scoped>

    
</style>