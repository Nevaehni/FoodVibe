<template>

    <div class="users_card">
        <div class="head_container">
            <span class="text-center font-weight-bold text-uppercase">Users list</span>
            <button class="btn btn-primary" data-toggle="modal" data-target="#newUserModal">New user</button>
        </div>
        
        <div class="users_body" style="background-color: white;">
            <div id="table">
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Options</th>
                        </tr>
                    </thead>

                    <!-- users  -->
                    <tbody>                  
                            <tr v-for="(u, id) in users" :key="id" :class="'user'+u.id">                        
                                <td :class="'user_id_'+u.id">{{u.id}}</td>
                                <td :class="'user_name_'+u.id">{{u.name}}</td>
                                <td>
                                    <button type="button" data-toggle="modal" :data-target="'#userModal'+u.id" class="btn btn-success btn-rounded edit_btn">Edit</button>
                                    <button type="button" class="btn btn-danger btn-rounded remove_btn" @click="deleteUser(u.id)">Remove</button>                                  
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- user edit modals  -->
        <div v-for="(u, id) in users" :key="id" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" :id="'userModal'+u.id" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">Users</div>
                    <div class="modal-body">
                        <form :class="'form_'+u.id">
                            <div class="form-group">
                                <label for="form_user_id">ID</label>
                                <input type="text" class="form-control" :name="'user_id'+u.id " :id="'form_user_id'+u.id " :value="u.id" placeholder="Enter new id">
                            </div>

                            <div class="form-group">
                                <label for="form_user_name">name</label>
                                <input type="text" class="form-control" :name="'user_name'+u.id " :id="'form_user_name'+u.id " :value="u.name" placeholder="Enter new name">
                            </div>

                            <div class="form-group">
                                <label for="form_user_address">address</label>
                                <input type="text" class="form-control" :name="'user_address'+u.id " :id="'form_user_address'+u.id " :value=" u.address " placeholder="Enter new address">
                            </div>

                            <div class="form-group">
                                <label for="form_user_city">city</label>
                                <input type="text" class="form-control" :name="'user_city'+u.id " :id="'form_user_city'+u.id " :value=" u.city " placeholder="Enter new city">
                            </div>

                            <div class="form-group">
                                <label for="form_user_zipcode">zipcode</label>
                                <input type="text" class="form-control" :name="'user_zipcode'+u.id " :id="'form_user_zipcode'+u.id " :value=" u.zipcode " placeholder="Enter new zipcode">
                            </div>

                            <div class="form-group">
                                <label for="form_user_phone">phone</label>
                                <input type="text" class="form-control" :name="'user_phone'+u.id " :id="'form_user_phone'+u.id " :value=" u.phone " placeholder="Enter new phone">
                            </div>

                            <div class="form-group">
                                <label for="form_user_role">role</label>
                                <input type="text" class="form-control" :name="'user_role'+u.id " :id="'form_user_role'+u.id " :value=" u.role " placeholder="Enter new role">
                            </div>

                            <div class="form-group">
                                <label for="form_user_email">email</label>
                                <input type="email" class="form-control" :name="'user_email'+u.id " :id="'form_user_email'+u.id " :value=" u.email " placeholder="Enter new email">
                            </div>

                            <div class="form-group">
                                <label for="form_user_password">password</label>
                                <input type="password" class="form-control" :name="'user_password'+u.id " :id="'form_user_password'+u.id " placeholder="Enter new password">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="updateUser(u.id)" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">BACK</button>
                    </div>
                </div>                   
            </div>
        </div>

        <!-- new user modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="newUserModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">New user</div>
                    <div class="modal-body">
                        <form class="form_new_user">      

                            <div class="form-group">
                                <label for="form_user_name">name</label>
                                <input type="text" class="form-control" name="'user_name" id="'form_user_name" placeholder="Enter new name">
                            </div>

                            <div class="form-group">
                                <label for="form_user_address">address</label>
                                <input type="text" class="form-control" name="user_address " id="form_user_address" placeholder="Enter new address">
                            </div>

                            <div class="form-group">
                                <label for="form_user_city">city</label>
                                <input type="text" class="form-control" name="user_city" id="form_user_city" placeholder="Enter new city">
                            </div>

                            <div class="form-group">
                                <label for="form_user_zipcode">zipcode</label>
                                <input type="text" class="form-control" name="user_zipcode" id="form_user_zipcode" placeholder="Enter new zipcode">
                            </div>

                            <div class="form-group">
                                <label for="form_user_phone">phone</label>
                                <input type="text" class="form-control" name="user_phone" id="form_user_phone" placeholder="Enter new phone">
                            </div>

                            <div class="form-group">
                                <label for="form_user_role">role</label>
                                <input type="text" class="form-control" name="user_role" id="form_user_role" placeholder="Enter new role">
                            </div>

                            <div class="form-group">
                                <label for="form_user_email">email</label>
                                <input type="email" class="form-control" name="user_email" id="form_user_email" placeholder="Enter new email">
                            </div>

                            <div class="form-group">
                                <label for="form_user_password">password</label>
                                <input type="password" class="form-control" name="user_password" id="form_user_password" placeholder="Enter new password">
                            </div> 

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="newUser()" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
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
            users: null,
        }
    },
    created()
    {
        // get all users
        axios.get('users')
        .then(response => 
        {
            this.users = response.data  
        })            
        .catch(err => 
        {
            console.log('My error '+err);
        })           
    },
    methods:
    {
        // delete user 
        deleteUser(id)
        {
            axios.delete('users/'+id)
            .then(response =>{
                $('.user'+id).hide();                
            });   

            console.log('test')
        },

        // update user 
        updateUser(id)
        {
            let formData = $('.form_'+id).serializeArray();

            axios.patch('users/'+id, {
                id       :  id,
                name     :  formData[1].value,
                address  :  formData[2].value,
                city     :  formData[3].value,
                zipcode  :  formData[4].value,                
                phone    :  formData[5].value,                
                role     :  formData[6].value,
                email    :  formData[7].value,
                password :  formData[8].value,
            })
            .then(response =>{
                $('.user_id_'+id).html(response.data[0]);                
                $('.user_name_'+id).html(response.data[1]);              
            });   
        },

        // new user 
        newUser()
        {
            let formData = $('.form_new_user').serializeArray();
            
            console.log(formData)
            axios.post('users', {
                name     :  formData[0].value,
                address  :  formData[1].value,
                city     :  formData[2].value,
                zipcode  :  formData[3].value,                
                phone    :  formData[4].value,                
                role     :  formData[5].value,
                email    :  formData[6].value,
                password :  formData[7].value,
            })
            .then(response =>{
                this.$parent.userReRender();           
            });   
        }
    }
}
</script>