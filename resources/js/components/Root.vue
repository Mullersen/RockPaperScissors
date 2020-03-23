<template>
    <div id="page-wrapper">
        <div id="grid-wrapper" class="row align-items-center no-gutters">
            <Player id="player-container" class="col-4 game"/>
            <div id="middlesection" class="col-4 game">
                <ScoreKeeper/>
            </div>
            <Computer id="computer-container" class="col-4 game" />
        </div>
    </div>
</template>

<script>
import Computer from './Computer.vue';
import Player from './Player';
import ScoreKeeper from './ScoreKeeper.vue';

    export default {
        name: "Root",
        components: {
           ScoreKeeper,
           Computer,
           Player,
       }
    }
</script>

<style>
#page-wrapper{
    height: 100%;

}
#grid-wrapper{
    height:80vh;
    margin-top: 10vh;
}
.game{
    height: 80vh;
}
</style>
