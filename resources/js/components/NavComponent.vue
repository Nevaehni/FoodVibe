<template>
    <div>
        <nav class="navContainer">
            <div class="logo">
                <span class="logo_name" >FoodVibe</span>   
                <img class="logo_img" :src="imgAsset+'/logo/logo.png'" alt="">
            </div>    
            <h3 class="welcomeText">Logged in as {{userData.name}} #<span id="idUser">{{userData.id}}</span></h3>

            <div class="buttons" >        
                <a v-if="user" href="#"><span>Basket</span></a>
                <a v-if="user" href="#"><span>Order History</span></a>                
                <a v-if="user" onclick="event.preventDefault();" @click="toggleProfile()" href="profile"><span>Edit Profile</span></a>
                <a v-if="user" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>Logout</span></a>
                <a v-else href="#" onclick="event.preventDefault();" @click="toggleLogin()"><span>Login</span></a>
            </div>      
        </nav>
        
        <!--login form -->   
        <form v-if="loginShow" method="POST" :action="loginRoute" id="login_form">      
            <input type="hidden" name="_token" :value="csrfToken">     
            <a id="close_btn" onclick="event.preventDefault();" @click="toggleLogin()" href="#">X</a>       
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
                <a href="register" type="submit" class="btn btn-primary">
                    Register
                </a>                
            </div>
        </form>

        <!--Profile form -->   
        <form v-if="profileShow" method="POST" :action="profileUpdateRoute" id="profile_form">      
            <input type="hidden" name="_token" :value="csrfToken">     
            <a id="close_btn" onclick="event.preventDefault();" @click="toggleProfile()" href="#">X</a> 

            <label for="name">Full name</label>
            <input type="text" name="name" :value="userData.name" :placeholder="userData.name">

            <label for="address">Adress</label>
            <input type="text" name="address" :value="userData.address" :placeholder="userData.address">

            <label for="zipcode">Zipcode</label>
            <input type="text" name="zipcode" :value="userData.zipcode" :placeholder="userData.zipcode">

            <label for="city">City</label>
            <input type="text" name="city" :value="userData.city" :placeholder="userData.city">

            <label for="phone">Phone number</label>
            <input type="text" name="phone" :value="userData.phone" :placeholder="userData.phone">

            <label for="email">Email</label>
            <input type="email" name="email" :value="userData.email" :placeholder="userData.email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password">

            <div class="button_div">              
                <button type="submit" class="btn btn-primary">
                    Update
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
            //Userdata
            userData: {name: 'guest'},

            //UserCheck
            user: false,           

            //Login
            loginShow: false,
            csrfToken: null,

            //Setting edit
            profileShow: false,                  
        }
    },
    props: 
    {
        route: { type: String, required: true },
        imgAsset: String,
        loginRoute: String,
        profileUpdateRoute: String
    },
    created()
    {      
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
        toggleLogin: function()
        {
            this.loginShow = !this.loginShow
        },

        toggleProfile: function()
        {
            if(this.userData.name != 'guest' && this.userData.id != 'undefined')
            {   
                this.profileShow = !this.profileShow
            }
            else
            {
                this.profileShow = false
            }                    
        },
    }
}
</script>
