<template>
    <div>
        <div @click="notifyClick(1)"><h2>Rock</h2></div>
        <div @click="notifyClick(2)"><h2>Paper</h2></div>
        <div @click="notifyClick(3)"><h2>Scissors</h2></div>
    </div>
</template>

<script>
export default {
    name: "Buttons",
    methods: {
        notifyClick: function(value){
            this.$root.$emit('playerMove', value);//sending to player
            this.$root.$emit('playerScore', value);//sending to scorekeeper
        }
    }
}
</script>

<style>

</style>
