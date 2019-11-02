<template>
    <div class="users_card" v-html="content">

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
        axios.get('user')
        .then(response => 
        {
            this.content = response.data   
        })            
        .catch(err => 
        {
            console.log('My error '+err);
        })    
    }
}
</script>

<style scoped>
.users_card
{
    display: flex;
    flex-direction: column;
    background-color: white;
    grid-area: u;
}

.users_body
{
    padding: 5px;
}

.users_body div table
{
    color: black;
}

.table
{
    margin-bottom: 0px;
}
</style>