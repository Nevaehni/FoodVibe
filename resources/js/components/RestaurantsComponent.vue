<template>
    <div class="mainContainer"> 

        <a :href="'restaurant/'+rest.id" class="contentContainer" v-for="(rest,id) in restaurants" :key="id">
            <img :src="'./images/restaurants/'+rest.image" alt="Restaurant logo">   
            <div class="title">
                <span>{{rest.title}}</span>
                <span v-if="restaurantStatus[rest.id] == 'closed'">Closed</span>
                <span v-else>Open</span>
                <div class="divider"></div> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ex corrupti aliquid deserunt molestiae architecto. Sit perferendis accusamus blanditiis totam nobis, amet excepturi dicta, nemo vero recusandae, voluptates delectus aspernatur?</p>
            </div>        
        </a>
        
    </div>
</template>

<script>
export default {   
    data() 
    {
        return{
            restaurants: [],         
            restaurantStatus: []         
        }
    },  

    created()
    {           
        axios.get('restaurants')
        .then(response => 
        {
            this.restaurants = response.data.restaurant;			
            this.restaurantStatus = response.data.time;	
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

.contentContainer
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

.contentContainer img
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
    flex: 1;
      color: #707070;
}

.title span
{
    font-size: 30px;
}

.title span:nth-of-type(2) 
{
    float:right;
}

.title p
{
    font-size: 15px;
    margin-top: 15px;  
}

.divider
{
    width: 100%;
    border: 1px solid #707070;
}
</style>