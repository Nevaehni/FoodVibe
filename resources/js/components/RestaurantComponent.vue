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

<template>
    <div>
        <div class="mainContainer"> 
            <div class="contentContainer">
                <img :src="'../images/restaurants/'+this.consumables.image" alt="Restaurant logo">
                <div class="title">
                    <span>{{this.consumables.title}}</span>
                    <div class="divider"></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ex corrupti aliquid deserunt molestiae architecto. Sit perferendis accusamus blanditiis totam nobis, amet excepturi dicta, nemo vero recusandae, voluptates delectus aspernatur?</p>
                </div>    
            </div>
            <div class="contentContainer" v-for="(con,id) in consumables.restaurant_consumables" :key="id">
                 <img :src="'../images/consumables/'+con.consumable.image" alt="Restaurant logo">               
                <div class="title">
                    <span>{{con.consumable.title}}</span>
                    <div class="divider"></div>
                    <p>{{"Category: "+con.category}}</p>
                </div>    
            </div>
        </div>         
       
    </div>
</template>

<script>
export default {   
    props:{
        restaurant: String
    },

    data() 
    {
        return{
            consumables: [],
            id: this.restaurant    
        }
    },  

    created()
    {      
        axios.get('consumables/' + this.id )
        .then(response => 
        {
            this.consumables = response.data;          		
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