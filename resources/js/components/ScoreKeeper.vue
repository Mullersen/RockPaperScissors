<template>

        <div id="score">
            <p>Player Score: {{playerScore}}</p>
            <p>Computer Score: {{computerScore}}</p>
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
        }
    },
    methods: {
         draw : function(){
            this.$root.$emit('draw');
        },
        computerWinner: function(){
            this.$root.$emit('computerWinner');
        },
        playerWinner: function(){
            this.$root.$emit('playerWinner');
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
