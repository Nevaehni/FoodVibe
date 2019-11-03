{{-- <span class="card-header text-center font-weight-bold text-uppercase py-1">Edit user</span>
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

            <tbody>                  
                @foreach($user as $u)
                    <tr>                        
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#userModal{{$u->id}}" class="btn btn-success btn-rounded edit_btn">Edit</button>
                            <button type="button" class="btn btn-danger btn-rounded remove_btn" onclick="deleteUser({{$u->id}})">Remove</button>                                  
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach($user as $u)
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="userModal{{ $u->id }}" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: white;">
                    <div class="modal-header">
                    Users
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="form_user_id">ID</label>
                            <input type="text" class="form-control" name="user_id{{ $u->id }}" id="form_user_id{{ $u->id }}" value="{{ $u->id }}" placeholder="Enter new id">
                        </div>

                        <div class="form-group">
                            <label for="form_user_name">name</label>
                            <input type="text" class="form-control" name="user_name{{ $u->id }}" id="form_user_name{{ $u->id }}" value="{{ $u->name }}" placeholder="Enter new name">
                        </div>

                        <div class="form-group">
                            <label for="form_user_address">address</label>
                            <input type="text" class="form-control" name="user_address{{ $u->id }}" id="form_user_address{{ $u->id }}" value="{{ $u->address }}" placeholder="Enter new address">
                        </div>

                        <div class="form-group">
                            <label for="form_user_city">city</label>
                            <input type="text" class="form-control" name="user_city{{ $u->id }}" id="form_user_city{{ $u->id }}" value="{{ $u->city }}" placeholder="Enter new city">
                        </div>

                        <div class="form-group">
                            <label for="form_user_zipcode">zipcode</label>
                            <input type="text" class="form-control" name="user_zipcode{{ $u->id }}" id="form_user_zipcode{{ $u->id }}" value="{{ $u->zipcode }}" placeholder="Enter new zipcode">
                        </div>

                        <div class="form-group">
                            <label for="form_user_phone">phone</label>
                            <input type="text" class="form-control" name="user_phone{{ $u->id }}" id="form_user_phone{{ $u->id }}" value="{{ $u->phone }}" placeholder="Enter new phone">
                        </div>

                        <div class="form-group">
                            <label for="form_user_role">role</label>
                            <input type="text" class="form-control" name="user_role{{ $u->id }}" id="form_user_role{{ $u->id }}" value="{{ $u->role }}" placeholder="Enter new role">
                        </div>

                        <div class="form-group">
                            <label for="form_user_email">email</label>
                            <input type="email" class="form-control" name="user_email{{ $u->id }}" id="form_user_email{{ $u->id }}" value="{{ $u->email }}" placeholder="Enter new email">
                        </div>

                        <div class="form-group">
                            <label for="form_user_password">password</label>
                            <input type="password" class="form-control" name="user_password{{ $u->id }}" id="form_user_password{{ $u->id }}" placeholder="Enter new password">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close">SAVE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">BACK</button>
                </div>
            </div>                   
        </div>
    </div>
@endforeach
 --}}
