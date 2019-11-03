<template>
    <div class="consumables_card" >
        testt
    </div>
</template>

<script>
export default {
     data()
    {
        return{
            content: null,
        }
    },
    created()
    {
        axios.get('consumables')
        .then(response => 
        {
            this.content = response.data   
        })            
        .catch(err => 
        {
            console.log('My error '+err);
        })   
    },
}
</script>

<style scoped>
.consumables_card
{
    /* display: flex;
    flex-direction: column; */
    background-color: white;
    grid-area: o;
}
</style>