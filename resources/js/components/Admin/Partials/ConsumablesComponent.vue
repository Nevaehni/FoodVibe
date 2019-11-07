<template>

    <div class="consumables_card">
        <div class="head_container">
            <span class="text-center font-weight-bold text-uppercase">consumables list</span>
            <button class="btn btn-primary" data-toggle="modal" data-target="#newConsumableModal">New consumable</button>
        </div>
        
        <div class="consumables_body" style="background-color: white;">
            <div id="table">
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Product</th>
                            <th class="text-center">Options</th>
                        </tr>
                    </thead>

                    <!-- consumables  -->
                    <tbody>                  
                            <tr v-for="(u, id) in consumables" :key="id" :class="'consumable'+u.id">                        
                                <td :class="'consumable_id_'+u.id">{{u.id}}</td>
                                <td :class="'consumable_name_'+u.id">{{u.title}}</td>
                                <td>
                                    <button type="button" data-toggle="modal" :data-target="'#consumableModal'+u.id" class="btn btn-success btn-rounded edit_btn">Edit</button>
                                    <button type="button" class="btn btn-danger btn-rounded remove_btn" @click="deleteConsumable(u.id)">Remove</button>                                  
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- consumable edit modals  -->
        <div v-for="(u, id) in consumables" :key="id" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" :id="'consumableModal'+u.id" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">consumables</div>
                    <div class="modal-body">
                        <form :class="'form_'+u.id">

                            <div class="form-group">
                                <label for="form_consumable_id">ID</label>
                                <input type="text" class="form-control" :name="'consumable_id'+u.id " :id="'form_consumable_id'+u.id " :value="u.id" placeholder="Enter new id">
                            </div>

                            <div class="form-group">
                                <label for="form_consumable_id">Title</label>
                                <input type="text" class="form-control" :name="'consumable_title'+u.id " :id="'form_consumable_title'+u.id " :value="u.title" placeholder="Enter new Title">
                            </div>

                            <div class="form-group">
                                <label for="form_consumable_id">Category</label>
                                <input type="text" class="form-control" :name="'consumable_category'+u.id " :id="'form_consumable_category'+u.id " :value="u.category" placeholder="main course / side dish / drink">
                            </div>

                            <div class="form-group">
                                <label for="form_consumable_id">Image name</label>
                                <input type="text" class="form-control" :name="'consumable_image'+u.id " :id="'form_consumable_image'+u.id " :value="u.image" placeholder="Change image file name">
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="updateConsumable(u.id)" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">BACK</button>
                    </div>
                </div>                   
            </div>
        </div>

        <!-- new consumable modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="newConsumableModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">New consumable</div>
                    <div class="modal-body">
                        <form class="form_new_consumable">      

                            <div class="form-group">
                                <label for="form_consumable_title">title</label>
                                <input type="text" class="form-control" name="consumable_title" id="form_consumable_title" placeholder="Enter new title">
                            </div>

                            <div class="form-group">
                                <label for="form_consumable_category">category</label>
                                <input type="text" class="form-control" name="consumable_category" id="form_consumable_category" placeholder="Enter new category">
                            </div>

                            <div class="form-group">
                                <label for="form_consumable_image">image file name</label>
                                <input type="text" class="form-control" name="consumable_image" id="form_consumable_image" placeholder="Enter new image file name">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="newConsumable()" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
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
            consumables: null,
        }
    },
    created()
    {
        axios.get('admin/consumables')
        .then(response => 
        {
            this.consumables = response.data  
        })            
        .catch(err => 
        {
            console.log('My error '+err);
        })   
    },

    methods:
    {
        // delete consumable 
        deleteConsumable(id)
        {
            axios.delete('admin/consumables/'+id)
            .then(response =>{
                $('.consumable'+id).hide();                
            });   

            console.log('test')
        },

        // update consumable 
        updateConsumable(id)
        {
            let formData = $('.form_'+id).serializeArray();

            axios.patch('admin/consumables/'+id, {
                id       :  id,
                title     :  formData[1].value,
                category  :  formData[2].value,
                image     :  formData[3].value,
            })
            .then(response =>{
                $('.consumable_id_'+id).html(response.data[0]);                
                $('.consumable_name_'+id).html(response.data[1]);              
            });   
        },

        // new consumable 
        newConsumable()
        {
            let formData = $('.form_new_consumable').serializeArray();
            
            axios.post('admin/consumables', {
                title     :  formData[0].value,
                category  :  formData[1].value,
                image     :  formData[2].value,
            })
            .then(response =>{
                this.$parent.consumableReRender();           
            });   
        }
    }
}
</script>