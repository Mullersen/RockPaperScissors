<template>
        <div id="score" class="shadow">
            <div class="row text-center my-2">
                <div class="col-6">
                    <h2>Player Score</h2>
                    <h1 class="text-white">{{playerScore}}</h1>
                </div>
                <div class="col-6">
                    <h2>Computer Score:</h2>
                    <h1 class="text-white">{{computerScore}}</h1>
                </div>
            </div>
            <h2 class="text-center my-4">{{winner}}</h2>
            <Buttons/>
        </div>
</template>

<script>
import Buttons from './Buttons.vue'

export default {
    name: 'ScoreKeeper',
    components: {
        Buttons,
    },
    mounted: function(){
         this.$root.$on('playerScore', this.updatePlayerMove);
         this.$root.$on('computerScore', this.updateScore);
    },
    data: function(){
        return{
            playerScore: 0,
            computerScore: 0,
            playerMove : String,
            winner: "Choose a move to start"
        }
    },
    methods: {
         draw : function(){
            this.$root.$emit('draw');
            this.winner = "DRAW";
        },
        computerWinner: function(){
            this.$root.$emit('computerWinner');
            this.winner = "YOU LOOSE";
        },
        playerWinner: function(){
            this.$root.$emit('playerWinner');
            this.winner = "YOU WIN!!";
        },
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
            //before theres a winner declared make sure we know what each persons move is.
            if (newComputerMove == "Rock" && this.playerMove == "Paper"){
                this.playerScore++;
                this.playerWinner();
            } else if(newComputerMove == "Rock" && this.playerMove == "Scissors"){
                this.computerScore++;
                this.computerWinner();
            } else if(newComputerMove == "Paper" && this.playerMove == "Scissors"){
                this.playerScore++;
                this.playerWinner();
            } else if(newComputerMove == "Paper" && this.playerMove == "Rock"){
                this.computerScore++;
                this.computerWinner();
            } else if(newComputerMove == "Scissors" && this.playerMove == "Paper"){
                this.computerScore++;
                this.computerWinner();
            } else if(newComputerMove == "Scissors" && this.playerMove == "Rock"){
                this.playerScore++;
                this.playerWinner();
            } else if(newComputerMove == "Scissors" && this.playerMove == "Scissors"){
                this.draw();
            } else if(newComputerMove == "Rock" && this.playerMove == "Rock"){
                this.draw();
            } else if(newComputerMove == "Paper" && playerMove == "Paper"){
                this.draw();
            };
        },
    }
}
</script>

<style>
#score{
    background-color: #2A628F;
    height:80vh;
}
</style>
