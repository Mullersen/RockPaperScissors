<template>
    <div ref="computer-class" class="computer-container">
        <p>Computers Move: {{computerMove}}</p>
    </div>
</template>

<script>
export default {
    name: "Computer",
    mounted: function(){
         this.$root.$on('chooseComputerMove', this.getComputerMove);
         this.$root.$on('computerWinner', this.computerWinner);
         this.$root.$on('playerWinner', this.playerWinner);
         this.$root.$on('draw', this.draw);
    },
    data : function(){
        return{
            computerMove: "",
        }
    },
    methods: {
        draw: function(){
             var element = this.$refs["computer-class"];
           element.style.backgroundColor="#3E92CC";
        },
        playerWinner: function(){
        var element = this.$refs["computer-class"];
           element.style.backgroundColor="red";
        },
        computerWinner: function(){
           var element = this.$refs["computer-class"];
           element.style.backgroundColor="green";

        },
        getComputerMove : function(){
            axios.get('/computer-move')
                .then(response => {
                    //console.log(response);
                    this.computerMove = response.data.computerMove;
                    var newComputerMove = response.data.computerMove;
                    this.$root.$emit('computerScore', newComputerMove); // sending to the scoreKeeper
                    console.log(response.data.computerMove)
                })
                .catch(error => {
                    console.log(error);
                    this.quote = 'Error getting the computer move';
                });
        }
    }
}
</script>

<style>
#computer-container{
    background-color: #3E92CC;
}
.computerWinner{
    background-color: green;
}
</style>
