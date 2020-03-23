<template>
    <div ref="player-class" class="player-container">
        <p>Your move: {{move}}</p>
    </div>
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
        this.$root.$on('computerWinner', this.computerWinner);
        this.$root.$on('playerWinner', this.playerWinner);
        this.$root.$on('draw', this.draw);
    },
    methods: {
        draw: function(){
             var element = this.$refs["player-class"];
           element.style.backgroundColor="#3E92CC";
        },
        computerWinner: function(){
           var element = this.$refs["player-class"];
           element.style.backgroundColor="red";

        },
        playerWinner: function(){
             var element = this.$refs["player-class"];
            element.style.backgroundColor="green";
        },
        showPlayerMove: function(value){
            if(value == 1){
                this.move = "Rock"
            } else if (value == 2){
                this.move = "Paper"
            } else if (value == 3){
                this.move = "Scissors"
            }
        }
    }

}
</script>

<style>
.player-container{
    background-color: #3E92CC;
}

</style>
