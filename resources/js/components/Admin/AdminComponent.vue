<template>
<div class="manage_users">
    <users-component :key="userKey"></users-component>   
    <!-- <consumables-component></consumables-component> -->
    
    <!-- <select @change="getOrdersAjax($event)">
        <option disabled selected>Select user</option>
        <option v-for="(user, id) in userData" :key="id" :value="user.id">{{user.name}}</option>
    </select>
    
    <div class="panel-group col-md-12" v-for="(con, id) in conTable" :key="id">
        <div v-html="con"></div>
        <div onclick="return confirm('are you sure?')" @click="deleteOrderAjax(id)" :class="'deleteOrder button'+id">Delete order</div>
    </div>   -->
    
</div>
</template>

<script>
Vue.component('users-component', require('./Partials/UsersComponent.vue').default);
Vue.component('consumables-component', require('./Partials/ConsumablesComponent.vue').default);


export default {
    data()
    {
        return{
            userData: null,
            conTable: null,
            userKey: 0,
        }
    },

    props:
    {
        users: undefined,
    },

    created()
    {        
        this.userData = JSON.parse(this.users)
    },

    methods:
    {
        userReRender()        
        {
            this.userKey += 1;  
        }
        //Get orders of user
        // getOrdersAjax: function()
        // {
        //     axios.get('admin/show', {
        //         params: {
        //             user_id: event.target.value
        //         }
        //     }).then(response => 
        //     {
        //         this.conTable = response.data     
        //     })            
        //     .catch(err => 
        //     {
        //         console.log('My error '+err);
        //     })    
        // },

        // //Delete order
        // deleteOrderAjax: function(orderid)
        // {
        //     axios.delete('admin/'+orderid)
        //     .then(response =>{

        //         $('.order'+orderid).hide();
        //         $('.button'+orderid).hide();   
                
        //     });
        // }
    }
}

</script>