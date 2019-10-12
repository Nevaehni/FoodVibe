<template>    

    <div class="mainContainer"> 
        <div class="addConsumable">

            Remove
            <form action="#" @submit.prevent="onSubmit">
                <select name="addSelect">
                    <option :value="con.consumable.id" v-for="(con,id) in conObj.restaurant_consumables" :key="id">{{con.consumable.title}}</option>
                </select>
                <button type="submit" class="btn btn-primary">Remove product</button>
            </form>

            <br>
            
            Add
            <form action="" @submit.prevent="onSubmit">
                <select name="addSelect">
                    <option :value="cons.id" v-for="(cons,id) in allCons" :key="id">{{cons.title}}</option>
                </select>
                <input type="number" placeholder="Price">
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
        }
    },

    props:
    {
        conObj: {},
        routeCons: String
    },
    
    created(){
        axios.get(this.routeCons)
        .then(response => 
        {
            this.allCons = response.data;     		
        })
        .catch(err => 
        {
            console.log('My error'+err);
        }) 
    },

    methods:{

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