<template>
<div class="manage_users">
   <button @click="ajax()">Click me to load</button>

    <div v-for="(con, id) in conTable" :key="id" v-html="con">

    </div>
  
    
</div>
</template>

<script>
import { userInfo } from 'os'

export default {
    data()
    {
        return{
            userData: null,
            conTable: null,
        }
    },

    props:
    {
        // users: undefined,
    },

    created()
    {        
        // this.userData = JSON.parse(this.users)
    },

    computed:
    {
        
    },

    methods:
    {
        ajax: function()
        {
            axios.get('admin/show').then(response => 
            {
                this.conTable = response.data     		
                console.log(response.data);  		
            })
            .catch(err => 
            {
                console.log('My error'+err);
            })    
        }
    }
}

</script>

<style>
  

    
</style>