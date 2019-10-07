<template>
    <div>
        <nav class="navContainer">
            <div class="logo">
                <span class="logo_name" >FoodVibe</span>   
                <img class="logo_img" :src="imgAsset+'/logo/logo.png'" alt="">
            </div>    
            <h3 class="welcomeText">Welcome {{userData.name}}</h3>

            <div class="buttons">        
                <a href="#"><span>Basket</span></a>
                <a href="#"><span>Order History</span></a>
                <a v-if="user" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>Logout</span></a>
                <a v-else href="#" onclick="event.preventDefault();" @click="toggle()"><span>Login</span></a>
            </div>      
        </nav>
        
        <!--login form -->   
        <form v-if="loginShow" method="POST" :action="loginRoute" id="login_form">      
            <input type="hidden" name="_token" :value="csrfToken">     
            <a id="close_btn" onclick="event.preventDefault();" @click="toggle()" href="#">X</a>       
            <div class="email_div">
                <label for="email" class="">E-Mail Address</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="" name="email" required autocomplete="email">                                 
                </div>
            </div>

            <div class="password_div">
                <label for="password" class="">Password</label>
                <div class="">
                    <input id="password" type="password" class="" name="password" required autocomplete="current-password">
                </div>
            </div>

            <div class="button_div">              
                <button type="submit" class="btn btn-primary">
                    Login
                </button>                
                <button type="submit" class="btn btn-primary">
                    Register
                </button>                
            </div>
        </form>

</div>
</template>

<script>
export default {
    data()
    {
        return{
            //User
            user: false,
            userData: {name: 'guest'},

            //Login
            loginShow: false,
            csrfToken: null,
        }
    },
    props: 
    {
        route: { type: String, required: true },
        imgAsset: String,
        loginRoute: String
    },
    created()
    {
        console.log(this.loginRoute)
        //Check if user is logged in
        axios.get(this.route)
        .then(response => 
        {
            if(typeof response.data === 'object')
            {
                this.user = true;
                this.userData = response.data;
            }
            else
            {
                this.user = false;
            }    
        })
        .catch(err => {
            console.log("My error: "+err)
        });

        //Get CSRF token from app.blade
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
    },
    methods:{
        toggle: function(){
            this.loginShow = !this.loginShow
        }
    }
}
</script>

<style scoped>

#login_form
{
    background-color: #000000;
    color: white;
    border: 10px solid #FFB101;
    border-radius: 35px;
    text-align: center;
    position: fixed;   
    left: 45%;
    top: 20%;
    max-width: 300px;
    max-height: 300px;
    z-index: 5;
    opacity: 1!important;
}

#close_btn
{
    position: absolute;
    right: 6px;
    top: 6px;
    width: 25px;
    padding: 1px;
    height: 25px;
    border: 1px solid white;
    border-radius: 50%;
}

.password_div, .button_div, .email_div
{
    margin: 20px;
}
</style>
