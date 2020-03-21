<template>
    <div>
        <p>Player Score: {{playerScore}}</p>
        <p>Computer Score: {{computerScore}}</p>
    </div>
</template>

<script>
export default {
    name: 'ScoreKeeper',
    mounted: function(){
         this.$root.$on('playerScore', this.updatePlayerMove);
         this.$root.$on('computerScore', this.updateScore);
    },
    data: function(){
        return{
            playerScore: 0,
            computerScore: 0,
            playerMove : String,
        }
    },
    methods: {
        updatePlayerMove: function(value){
            if(value == 1){
                this.playerMove = "Rock"
            } else if (value == 2){
                this.playerMove = "Paper"
            } else if (value ==3){
                this.playerMove = "Scissors"
            };
            this.$root.$emit('chooseComputerMove');
        },
        updateScore: function(newComputerMove){
            console.log("this is the computers move" +newComputerMove);
            //before theres a winner declared make sure we know what each persons move is.
            if (newComputerMove == "Rock" && this.playerMove == "Paper"){
                this.playerScore++;
            } else if(newComputerMove == "Rock" && this.playerMove == "Scissors"){
                this.computerScore++;
            } else if(newComputerMove == "Paper" && this.playerMove == "Scissors"){
                this.playerScore++;
            } else if(newComputerMove == "Paper" && this.playerMove == "Rock"){
                this.computerScore++;
            } else if(newComputerMove == "Scissors" && this.playerMove == "Paper"){
                this.computerScore++;
            } else if(newComputerMove == "Scissors" && this.playerMove == "Rock"){
                this.playerScore++;
            } else if(newComputerMove == "Scissors" && this.playerMove == "Scissors"){
                this.draw();
            } else if(newComputerMove == "Rock" && this.playerMove == "Rock"){
                this.draw();
            } else if(newComputerMove == "Paper" && playerMove == "Paper"){
                this.draw();
            };
        },
        draw : function(){
            //draw stuff goes here
        },
    }
}
</script>

<style>

</style>
