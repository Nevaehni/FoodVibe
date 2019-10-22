<template>
    <div>
        <edit-component v-if="edit" :conObj="consumables" :routeCons="allCons" :restid="restaurant"></edit-component>
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
                <div class="foodContent" v-for="(con,id) in consumables.restaurantconsumables" :key="id">       
                    <div v-if="con.category === 'main course'">
                        <img :src="'../images/consumables/'+con.consumable.image" alt="Restaurant logo">               
                        <div class="title">
                            <span>{{con.consumable.title}}</span>
                            <div class="divider"></div>
                            <p>{{"Category: "+con.category}}</p>
                            <p>{{"Price: €"+con.price}}</p>
                            <a @click="addToBasket(con.restaurant_id, con.consumable_id, con.price)">+</a>
                        </div>                         
                    </div>   
                </div> 
            </div>

            <div class="foodContainer">
                <span class="category">Side dishes</span>         
                <div v-for="(con,id) in consumables.restaurantconsumables" :key="id">     
                    <div v-if="con.category === 'side dish'">               
                        <img :src="'../images/consumables/'+con.consumable.image" alt="Restaurant logo">               
                        <div class="title">
                            <span>{{con.consumable.title}}</span>
                            <div class="divider"></div>
                            <p>{{"Category: "+con.category}}</p>
                            <p>{{"Price: €"+con.price}}</p>
                            <a @click="addToBasket(con.restaurant_id, con.consumable_id, con.price)">+</a>
                        </div> 
                    </div>  
                </div> 
            </div>

            <div class="foodContainer">
                <span class="category">Drinks</span>         
                <div v-for="(con,id) in consumables.restaurantconsumables" :key="id">    
                    <div v-if="con.category === 'drink'">                  
                        <img :src="'../images/consumables/'+con.consumable.image" alt="Restaurant logo">               
                        <div class="title">
                            <span>{{con.consumable.title}}</span>
                            <div class="divider"></div>
                            <p>{{"Category: "+con.category}}</p>
                            <p>{{"Price: €"+con.price}}</p>
                            <a @click="addToBasket(con.restaurant_id, con.consumable_id, con.price)">+</a>
                        </div>   
                    </div> 
                </div>
            </div> 

            <div class="cart">
                <h3>Cart</h3>
                <div v-if="cartSession != undefined">
                    <span v-for="(cart, id) in cartSessionData" :key="id">
                        <span>Consumable id: {{cart[0].consumable_id}} </span>
                        <span>price: {{cart[0].price}} </span>
                        <span>Quantity: {{cart[0].quantity}}</span>
                        <!-- <button @click="add(cart[0].restaurant_id, cart[0].consumable_id)" class="btn btn-primary">Add</button> -->
                        <!-- <button @click="remove(cart[0].restaurant_id, cart[0].consumable_id)" class="btn btn-primary">Remove</button>                 -->
                        <br>                      
                    </span>
                    <button @click="buy()" class="btn btn-primary">Buy</button>
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
            userRestId: {},

            //Cart post
            csrfToken: null,
            cartSessionData: null,            
        }
    },  

    props:
    {
        restaurant: String,
        allCons: String,
        cartRoute: String,
        cartSession: undefined
    },

    created()
    {              
        //parse cart items
        if(this.cartSession != undefined)
        {
            this.cartSessionData = JSON.parse(this.cartSession)
            console.log(this.cartSessionData)
        }
        
        //Get consumables
        axios.get('consumables/' + this.restaurant )
        .then(response => 
        {
            this.consumables = response.data;      		
        })
        .catch(err => 
        {
            console.log('My error'+err);
        })    

        //Check the current restaurant owner
        axios.get('owner/check')
        .then(response => 
        {
            this.userRestId = response.data;        		
        })
        .catch(err => 
        {
            console.log('My error'+err);
        })            

        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
    },

    methods: 
    {   
        //Add product to session
        addToBasket: function(restId, conId, price)
        {
            axios.post(this.cartRoute, {
                restaurant_id: restId,
                consumable_id: conId,                
                price: price,
                quantity: 1,
                _token: this.csrfToken
            }).then(response => 
            {
                this.cartSessionData = JSON.parse(response.data);        		
            })
            .catch(err => 
            {
                console.log('My error'+err);
            })    
        },

        //Buy products in the cart
        buy: function()
        {
            let route = this.cartRoute.replace('product', 'buy')
            axios.get(route).then(response => 
            {
                console.log(response.data)       		
            })
            .catch(err => 
            {
                console.log('My error'+err);
            })    
        },

        // //Add product 
        // add: function(restId, conId)
        // {
        //     axios.post(this.cartRoute, {
        //         restaurant_id: restId,
        //         consumable_id: conId,   
        //         _token: this.csrfToken
        //     }).then(response => 
        //     {
        //         console.log(response.data);        		
        //     })
        //     .catch(err => 
        //     {
        //         console.log('My error'+err);
        //     })    
        // }
    }
}
</script>

<style scoped>
.cart
{
    background-color: white;
    border: 1px black solid;
    width: 460px;
    height: auto;
    border-radius: 35px;
    padding: 1em;
    position: fixed;
    top: 390px;
    right: 1px;
}

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
    left: -9%;
    width: 80%;
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