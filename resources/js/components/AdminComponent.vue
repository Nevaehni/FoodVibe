<template>
<div class="manage_users">
   <button @click="ajax()"></button>

    <div v-html="conTable">

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
    body, html
    {
        background-color: white !important;
    }

    .panel-heading span
    {
        color: #fff;
        background-color: #343a40;
        padding: 0 10px 0 10px;
    }
</style>