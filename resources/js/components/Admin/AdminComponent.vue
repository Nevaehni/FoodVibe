<template>
<div class="manage_users">
    <users-component :key="userKey"></users-component>   
    <consumables-component :key="consumableKey"></consumables-component>
    <restaurants-component :key="restaurantKey"></restaurants-component>

</div>
</template>

<script>
Vue.component('users-component', require('./Partials/UsersComponent.vue').default);
Vue.component('consumables-component', require('./Partials/ConsumablesComponent.vue').default);
Vue.component('restaurants-component', require('./Partials/RestaurantsComponent.vue').default);


export default {
    data()
    {
        return{
            userKey: 0,
            consumableKey: 0,
            restaurantKey: 0,
        }
    },

created()
    {        
       
    },

    methods:
    {
        userReRender()        
        {
            this.userKey += 1;  
        },        
        
        consumableReRender()        
        {
            this.consumableKey += 1;  
        }, 

        restaurantReRender()        
        {
            this.restaurantKey += 1;  
        }        
    }
}

</script>