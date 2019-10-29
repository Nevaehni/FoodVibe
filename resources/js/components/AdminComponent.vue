<template>
<div class="manage_users">
    <select @change="getOrdersAjax($event)">
        <option disabled selected>Select user</option>
        <option v-for="(user, id) in userData" :key="id" :value="user.id">{{user.name}}</option>
    </select>
    
    <div class="panel-group col-md-12" v-for="(con, id) in conTable" :key="id">
            <div v-html="con"></div>
            <div onclick="return confirm('are you sure?')" @click="deleteOrderAjax(id)" class="deleteOrder">Delete order</div>
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
            csrfToken: null,
        }
    },

    props:
    {
        users: undefined,
    },

    created()
    {        
        this.userData = JSON.parse(this.users)

        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
    },

    methods:
    {
        //Get orders of user
        getOrdersAjax: function()
        {
            axios.get('admin/show', {
                params: {
                    user_id: event.target.value
                }
            }).then(response => 
            {
                this.conTable = response.data     
            })            
            .catch(err => 
            {
                console.log('My error'+err);
            })    
        },

        //Delete order
        deleteOrderAjax: function(orderid)
        {
            axios.delete('admin/'+orderid);
        }
    }
}

</script>

<style>
  

    
</style>