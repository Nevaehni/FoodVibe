<template>
    <div>
        <edit-component v-if="edit" :conObj="consumables" :routeCons="allCons"></edit-component>
        <div v-if="edit == false" class="mainContainer"> 
            
            <div class="contentContainer">
                <img :src="'../images/restaurants/'+this.consumables.image" alt="Restaurant logo">
                <div class="title">
                    <span>{{this.consumables.title}}</span>
                    <span v-if="consumables.id == userRestId.id" @click="edit = true">Edit Menu</span>
                    <div class="divider"></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ex corrupti aliquid deserunt molestiae architecto. Sit perferendis accusamus blanditiis totam nobis, amet excepturi dicta, nemo vero recusandae, voluptates delectus aspernatur?</p>
                </div>    
            </div>

            <div class="foodContainer">     
                <span class="category">Main courses</span>         
                <div class="foodContent" v-for="(con,id) in consumables.restaurant_consumables" :key="id">       
                    <div v-if="con.category === 'main course'">
                        <img :src="'../images/consumables/'+con.consumable.image" alt="Restaurant logo">               
                        <div class="title">
                            <span>{{con.consumable.title}}</span>
                            <div class="divider"></div>
                            <p>{{"Category: "+con.category}}</p>
                            <p>{{"Price: €"+con.price}}</p>
                            <a href="">+</a>
                        </div>                         
                    </div>   
                </div> 
            </div>

            <div class="foodContainer">
                <span class="category">Side dishes</span>         
                <div v-for="(con,id) in consumables.restaurant_consumables" :key="id">     
                    <div v-if="con.category === 'side dish'">               
                        <img :src="'../images/consumables/'+con.consumable.image" alt="Restaurant logo">               
                        <div class="title">
                            <span>{{con.consumable.title}}</span>
                            <div class="divider"></div>
                            <p>{{"Category: "+con.category}}</p>
                            <p>{{"Price: €"+con.price}}</p>
                            <a href="">+</a>
                        </div> 
                    </div>  
                </div> 
            </div>
            
            <div class="foodContainer">
                <span class="category">Drinks</span>         
                <div v-for="(con,id) in consumables.restaurant_consumables" :key="id">    
                    <div v-if="con.category === 'drink'">                  
                        <img :src="'../images/consumables/'+con.consumable.image" alt="Restaurant logo">               
                        <div class="title">
                            <span>{{con.consumable.title}}</span>
                            <div class="divider"></div>
                            <p>{{"Category: "+con.category}}</p>
                            <p>{{"Price: €"+con.price}}</p>
                            <a href="">+</a>
                        </div>   
                    </div> 
                </div>
            </div> 
            
        </div>
    </div>  
</template>

<script>
Vue.component('edit-component', require('./RestaurantEditComponent.vue').default);

export default {      
    data() 
    {
        return{
            //Edit
            edit: false,

            //Consumables
            consumables: {},

            //Check id restaurant
            userRestId: {}
        }
    },  

    props:
    {
        restaurant: Number,
        allCons: String  
    },

    created()
    {      
        axios.get('consumables/' + this.restaurant )
        .then(response => 
        {
            this.consumables = response.data; 
            // console.log(this.consumables.user_id)         		
        })
        .catch(err => 
        {
            console.log('My error'+err);
        })    

        axios.get('owner/check')
        .then(response => 
        {
            this.userRestId = response.data;        		
        })
        .catch(err => 
        {
            console.log('My error'+err);
        })            
    },
    methods: {
        
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

.contentContainer, .foodContainer
{
    width: 1333px;
    height: 203px;    
    position: relative;
    background-color: white;
    margin: 5px 0px 7px 0px;
    top: 5px;
    border-radius: 20px;
    display: flex;
    border: 1px solid #707070;
    text-decoration: none;
}

.contentContainer img, .foodContainer img
{
    border-radius: 12px;   
    height: 181px;
    width: 181px;
    object-fit: scale-down;   
    margin: 11px 0px 11px 25px;    
    flex: none;    
    border: 1px solid #707070;
}

.title
{
    max-width: 1058px;
    text-align: left;
    margin: 10px 0px 0px 30px;
    flex: 5;
    color: #707070;
}

.title span
{
    font-size: 30px;
}

.title p
{
    font-size: 15px;
    margin-top: 15px;  
}

.title a
{
    font-size: 30px;
}

.divider
{
    width: 100%;
    border: 1px solid #707070;
}

.foodContainer
{
    height: auto;
    width: 1100px;
    right: -8.5%;   
}

.category
{
    background-color: black;
    border-top-left-radius: 18px;
    border-bottom-left-radius: 18px;
    padding: 13px;
    width: auto;
    min-width: 110px;
    color: white;
    font-family: "Sitka Banner", italic;
}

.title span:nth-of-type(2) 
{
    float: right;
    width: 150px;
    border-radius: 35px;
    background-color: black;
    color: white;
    position: relative;
    align-self: center;
    vertical-align: middle;
    text-align: center;
    font-family: 'Sitka Banner', italic;
    font-size: 20px;
    border: 1px solid #707070;
    cursor: pointer;
}

</style>