<template>

    <div class="orders_card">
        <div class="head_container">
            <span class="text-center font-weight-bold text-uppercase">orders list</span>
        </div>
        
        <div class="admin_partial_body" style="background-color: white;">
            <div id="table">
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Order ID</th>
                            <th class="text-center">User ID</th>
                            <th class="text-center">Restaurant ID</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Options</th>
                        </tr>
                    </thead>

                    <!-- orders  -->
                    <tbody>                  
                        <tr v-for="(u, id) in orders" :key="id" :class="'order'+u.id">                        
                            <td :class="'order_id_'+u.id">{{u.id}}</td>
                            <td :class="'order_user_'+u.id">{{u.user_id}}</td>
                            <td :class="'order_restaurant_'+u.id">{{u.restaurant_id}}</td>
                            <td :class="'order_restaurant_'+u.id">€{{u.total}}</td>
                            <td>
                                <button type="button" data-toggle="modal" :data-target="'#orderModal'+u.id" class="btn btn-success btn-rounded edit_btn">View</button>                 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- order view modals  -->
        <div v-for="(u, id) in orders" :key="id" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" :id="'orderModal'+u.id" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">Ordered consumables -  Total price: €{{u.total}}  |  Orderdate : {{u.created_at}} </div>                   
                    <div class="modal-body">
                        <table id="classTable" class="table table-bordered">
                            
                            <tr>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>P.P.P</td>
                                <td>Category</td>
                                <td>Total price</td>
                            </tr>
                        <thead>
                        </thead>
                            <tbody>
                                <tr v-for="(uu, id) in u.consumable_orders" :key="id">
                                    <td>{{uu.consumable.title}}</td>
                                    <td>{{uu.quantity}}</td>
                                    <td>{{uu.total_price / uu.quantity}}</td>
                                    <td>{{uu.consumable.category}}</td>
                                    <td>{{uu.total_price}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">BACK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- new order modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="newOrderModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">New order</div>
                    <div class="modal-body">
                        <form class="form_new_order">      

                            <div class="form-group">
                                <label for="form_order_title">title</label>
                                <input type="text" class="form-control" name="order_title" id="form_order_title" placeholder="Enter new title">
                            </div>

                            <div class="form-group">
                                <label for="form_order_category">category</label>
                                <input type="text" class="form-control" name="order_category" id="form_order_category" placeholder="Enter new category">
                            </div>

                            <div class="form-group">
                                <label for="form_order_image">image file name</label>
                                <input type="text" class="form-control" name="order_image" id="form_order_image" placeholder="Enter new image file name">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="newOrder()" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
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
            orders: null,
        }
    },
    created()
    {
        axios.get('admin/orders')
        .then(response => 
        {
            this.orders = response.data  
        })            
        .catch(err => 
        {
            console.log('My error '+err);
        })   
    },

    methods:
    {
        // delete order 
        deleteOrder(id)
        {
            axios.delete('admin/orders/'+id)
            .then(response =>{
                $('.order'+id).hide();                
            });   

            console.log('test')
        },

        // update order 
        updateOrder(id)
        {
            let formData = $('.form_'+id).serializeArray();

            axios.patch('admin/orders/'+id, {
                id       :  id,
                title     :  formData[1].value,
                category  :  formData[2].value,
                image     :  formData[3].value,
            })
            .then(response =>{
                $('.order_id_'+id).html(response.data[0]);                
                $('.order_name_'+id).html(response.data[1]);              
            });   
        },

        // new order 
        newOrder()
        {
            let formData = $('.form_new_order').serializeArray();
            
            axios.post('admin/orders', {
                title     :  formData[0].value,
                category  :  formData[1].value,
                image     :  formData[2].value,
            })
            .then(response =>{
                this.$parent.orderReRender();           
            });   
        }
    }
}
</script>