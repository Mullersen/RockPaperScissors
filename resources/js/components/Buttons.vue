<template>
    <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
        <span class="btn-group-vertical" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary" @click="notifyClick(1)"><h1>Rock</h1></button>
                <button type="button" class="btn btn-secondary" @click="notifyClick(2)"><h1>Paper</h1></button>
                <button type="button" class="btn btn-secondary" @click="notifyClick(3)"><h1>Scissors</h1></button>
        </span>
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
