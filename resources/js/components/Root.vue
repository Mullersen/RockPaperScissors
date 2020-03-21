<template>
    <div>
        <Computer/>
        <Player/>
        <ScoreKeeper/>
        <Buttons/>
    </div>
</template>

<script>
import Computer from './Computer.vue';
import Player from './Player';
import ScoreKeeper from './ScoreKeeper.vue';
import Buttons from './Buttons.vue';

    export default {
        name: "Root",
        components: {
           ScoreKeeper,
           Computer,
           Player,
           Buttons,
       }
    }
</script>
