<template>
    <p> Your move: {{move}}</p>
</template>

<script>
export default {
    name: "Player",
    data: function(){
        return{
            move :"click a button to start the game",
        }
    },
    mounted: function(){
        this.$root.$on('playerMove', this.showPlayerMove);
    },
    methods: {
        showPlayerMove: function(value){
            if(value == 1){
                this.move = "Rock"
            } else if (value == 2){
                this.move = "Paper"
            } else if (value ==3){
                this.move = "Scissors"
            }
        }
    }

}
</script>

<style>

</style>
