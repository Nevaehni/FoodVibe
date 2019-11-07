<template>

    <div class="restaurants_card">
        <div class="head_container">
            <span class="text-center font-weight-bold text-uppercase">restaurants list</span>
            <button class="btn btn-primary" data-toggle="modal" data-target="#newRestaurantModal">New restaurant</button>
        </div>
        
        <div class="admin_partial_body" style="background-color: white;">
            <div id="table">
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Restaurant</th>
                            <th class="text-center">Options</th>
                        </tr>
                    </thead>

                    <!-- restaurants  -->
                    <tbody>                  
                        <tr v-for="(u, id) in restaurants" :key="id" :class="'restaurant'+u.id">                                             
                            <td :class="'restaurant_id_'+u.id">{{u.id}}</td>
                            <td :class="'restaurant_name_'+u.id">{{u.title}}</td>
                            <td>
                                <button type="button" data-toggle="modal" :data-target="'#restaurantModal'+u.id" class="btn btn-success btn-rounded edit_btn">Edit</button>
                                <button type="button" class="btn btn-danger btn-rounded remove_btn" @click="deleteRestaurant(u.id)">Remove</button>                                  
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- restaurant edit modals  -->
        <div v-for="(u, id) in restaurants" :key="id" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" :id="'restaurantModal'+u.id" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">restaurants</div>
                    <div class="modal-body">
                        <form :class="'form_'+u.id">

                            <div class="form-group">
                                <label for="form_restaurant_id">ID</label>
                                <input type="text" class="form-control" :name="'restaurant_id'+u.id " :id="'form_restaurant_id'+u.id " :value="u.id" placeholder="Enter new id">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_id">Title</label>
                                <input type="text" class="form-control" :name="'restaurant_title'+u.id " :id="'form_restaurant_title'+u.id " :value="u.title" placeholder="Enter new Title">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_id">Address</label>
                                <input type="text" class="form-control" :name="'restaurant_address'+u.id " :id="'form_restaurant_address'+u.id " :value="u.address" placeholder="Enter new Address">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_id">Zipcode</label>
                                <input type="text" class="form-control" :name="'restaurant_zipcode'+u.id " :id="'form_restaurant_zipcode'+u.id " :value="u.zipcode" placeholder="Enter new Zipcode">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_id">City name</label>
                                <input type="text" class="form-control" :name="'restaurant_city'+u.id " :id="'form_restaurant_city'+u.id " :value="u.city" placeholder="Enter new City">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_id">Phone name</label>
                                <input type="text" class="form-control" :name="'restaurant_phone'+u.id " :id="'form_restaurant_phone'+u.id " :value="u.phone" placeholder="Enter new Phone">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_id">Email name</label>
                                <input type="text" class="form-control" :name="'restaurant_email'+u.id " :id="'form_restaurant_email'+u.id " :value="u.email" placeholder="Enter new Email">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_id">Owner user id name</label>
                                <input type="text" class="form-control" :name="'restaurant_user_id'+u.id " :id="'form_restaurant_user_id'+u.id " :value="u.user_id" placeholder="Enter new Owner user id">
                            </div>
                            
                            <div class="form-group">
                                <label for="form_restaurant_id">Image name</label>
                                <input type="text" class="form-control" :name="'restaurant_image'+u.id " :id="'form_restaurant_image'+u.id " :value="u.image" placeholder="Change image file name">
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="updateRestaurant(u.id)" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">BACK</button>
                    </div>
                </div>                   
            </div>
        </div>

        <!-- new restaurant modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="newRestaurantModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">New restaurant</div>
                    <div class="modal-body">
                        <form class="form_new_restaurant">      

                            <div class="form-group">
                                <label for="form_restaurant_title">title</label>
                                <input type="text" class="form-control" name="restaurant_title" id="form_restaurant_title" placeholder="Enter new title">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_address">address</label>
                                <input type="text" class="form-control" name="restaurant_address" id="form_restaurant_address" placeholder="Enter new address">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_zipcode">zipcode</label>
                                <input type="text" class="form-control" name="restaurant_zipcode" id="form_restaurant_zipcode" placeholder="Enter new zipcode">
                            </div>
                            
                            <div class="form-group">
                                <label for="form_restaurant_image">image</label>
                                <input type="text" class="form-control" name="restaurant_image" id="form_restaurant_image" placeholder="Enter new image">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_city">city</label>
                                <input type="text" class="form-control" name="restaurant_city" id="form_restaurant_city" placeholder="Enter new city">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_phone">phone</label>
                                <input type="text" class="form-control" name="restaurant_phone" id="form_restaurant_phone" placeholder="Enter new phone">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_email">email</label>
                                <input type="text" class="form-control" name="restaurant_email" id="form_restaurant_email" placeholder="Enter new email">
                            </div>

                            <div class="form-group">
                                <label for="form_restaurant_user_id">owner user id</label>
                                <input type="text" class="form-control" name="restaurant_user_id" id="form_restaurant_user_id" placeholder="Enter new owner user id">
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="newRestaurant()" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">BACK</button>
                    </div>
                </div>                   
            </div>
        </div>
    </div>    
</template>

<script>
export default {
     data()
    {
        return{
            restaurants: null,
        }
    },
    created()
    {
        axios.get('admin/restaurants')
        .then(response => 
        {
            this.restaurants = response.data  
        })            
        .catch(err => 
        {
            console.log('My error '+err);
        })   
    },

    methods:
    {
        // delete restaurant 
        deleteRestaurant(id)
        {
            axios.delete('admin/restaurants/'+id)
            .then(response =>{
                $('.restaurant'+id).hide();                
            });   

            console.log('test')
        },

        // update restaurant 
        updateRestaurant(id)
        {
            let formData = $('.form_'+id).serializeArray();

            axios.patch('admin/restaurants/'+id, {
                id       :  id,
                title     :  formData[1].value,
                address  :  formData[2].value,
                zipcode     :  formData[3].value,
                image     :  formData[4].value,
                city     :  formData[5].value,
                phone     :  formData[6].value,
                email     :  formData[7].value,
                user_id     :  formData[8].value,
            })
            .then(response =>{
                $('.restaurant_id_'+id).html(response.data[0]);                
                $('.restaurant_name_'+id).html(response.data[1]);              
            });   
        },

        // new restaurant 
        newRestaurant()
        {
            let formData = $('.form_new_restaurant').serializeArray();
            
            axios.post('admin/restaurants', {
                title     :  formData[0].value,
                address  :  formData[1].value,
                zipcode     :  formData[2].value,
                image     :  formData[3].value,
                city     :  formData[4].value,
                phone     :  formData[5].value,
                email     :  formData[6].value,
                user_id     :  formData[7].value,
            })
            .then(response =>{
                this.$parent.restaurantReRender();           
            });   
        }
    }
}
</script>