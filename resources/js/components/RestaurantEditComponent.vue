<template>    

    <div class="mainContainer"> 
        <div class="addConsumable">

            Remove consumable from menu
            <form :action="deleteRoute" method="post">
                <input type="hidden" name="_token" :value="csrfToken">
                <select name="deleteID">
                    <option :value="con.consumable.id" v-for="(con,id) in orderedConsumables" :key="id">{{con.consumable.title}}  -  {{con.consumable.category}}</option>
                </select>
                <button type="submit" class="btn btn-primary">Remove product</button>
            </form>

            <br>
            
            Add consumable to menu
            <form :action="storeRoute" method="post">
                <input type="hidden" name="_token" :value="csrfToken"> 
                <select name="storeID">
                    <option :value="cons.id" v-for="(cons,id) in orderedAllConsumables" :key="id">{{cons.title}} - {{cons.category}}</option>
                </select>
                <input name="price" type="number" placeholder="Price" required step=".01">
                <button type="submit" class="btn btn-primary">Add to menu</button>
            </form>

            <br>

            Add new consumable
            <form :action="newConRoute" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" :value="csrfToken">                
                <input name="consumableName" type="text" placeholder="Product name">
                <input type="file" name="consumableImage">
                <select name="category">
                    <option disabled selected>Category</option>>
                    <option value="main course">Main course</option>
                    <option value="side dish">Side dish</option>
                    <option value="drink">Drinks</option>
                </select>
                <input type="hidden" name="rest" :value="restid">
                <input name="price" type="number" placeholder="Price" required step=".01">
                <button type="submit" class="btn btn-primary">Add product</button>
            </form>

        </div>
    </div>
        
</template>

<script>
export default {
    data(){
        return{
            allCons: {},
            storeRoute: this.routeCons.replace('all', 'store'),
            deleteRoute: this.routeCons.replace('all', 'delete'),
            newConRoute: this.routeCons.replace('all', 'new'),
            csrfToken: null
        }
    },
        
    computed:
    {
        //Order by category
        orderedConsumables: function () {
            return _.orderBy(this.conObj.restaurantconsumables, 'category', 'desc')
        },

        orderedAllConsumables: function () {
            return _.orderBy(this.allCons, 'category', 'desc')
        },
    },

    props:
    {
        conObj: {},
        routeCons: String,
        restid: Number
    },
    
    created()
    {
        //Get all consumables
        axios.get(this.routeCons)
        .then(response => 
        {
            this.allCons = response.data;  
        })
        .catch(err => 
        {
            console.log('My error '+err);
        }) 

        //Get csrfToken
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
    },

    methods:
    {
        storeRestaurant: function()
        {
            axios.get('store')
            .then(response => 
            {
                this.allCons = response.data;     		
            })
            .catch(err => 
            {
                console.log('My error '+err);
            }) 

        },

        deleteRestaurant: function()
        {

        },

    }
}
</script>

<style scoped>
.mainContainer
{
    width: 1364px;
    min-height: 873px;
    background-color: #FFB101;
    margin: auto;
    margin-top: 15px;
    padding-bottom: 15px;
    border-radius: 20px;
    text-align: -webkit-center;  
    border: 1px solid white;
}
</style>