<template>
    <p>Computers Move: {{computerMove}}</p>
</template>

<script>
export default {
    name: "Computer",
    mounted: function(){
         this.$root.$on('chooseComputerMove', this.getComputerMove);
    },
    data : function(){
        return{
            computerMove: "Click to start",
        }
    },
    methods: {
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

</style>
