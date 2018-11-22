<div class="col-md-12">
    <div class="row">
        <div class="col-md-5">
        <h3 class="display-5">Admin Management</h3>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @include('partial.error')
            <div class="card shadow p-3 mb-5 bg-white rounded">                
                <div class="card-body">
                    <h4 class="card-title">Add User</h4>
                    <form action="/adduser" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="username" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Username anda</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="email" required aria-describedby="helpId">
                          </div>
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="password" required aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="role">Role</label>
                          <select class="form-control" name="role" id="role">
                              <option value="">--Please Select--</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->roles_id}}">{{$role->nama_role}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" ><i class="fas fa-user-plus" style="color:white;"></i> Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            
        </div>
    </div>
    <div class="col-md-12 mt-4">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="display-5">User Management</h3>
                    <div class="table-responsive class="collapse" id="tUserResponsive"">
                        <table class="table" id="tUserManagement">
                            <thead class="thead-default">
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>E-mail</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="modalAdminEditUser" tabindex="-1" role="dialog" aria-labelledby="modalAdminEditUser" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAdminEditUser_Label">Edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="dashboard/admin/edit" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id_admin_edit" id="id_admin_edit" value="">
                            <label for="username_admin_edit">Username</label>
                            <input type="text" name="username_admin_edit" readonly id="username_admin_edit" class="form-control" placeholder="username" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Username anda</small>
                        </div>
                        <div class="form-group">
                                <label for="email_admin_edit">Email</label>
                                <input type="email" name="email_admin_edit" id="email_admin_edit" class="form-control" placeholder="email" required aria-describedby="helpId">
                          </div>
                        <div class="form-group">
                            <label for="password_admin_edit">Password</label>
                            <input type="password" name="password_admin_edit" id="password_admin_edit" class="form-control" placeholder="password" required aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="role">Role</label>
                          <select class="form-control" name="role_admin_edit" id="role_admin_edit">
                              <option value="">--Please Select--</option>
                                <option value="1">admin</option>
                                <option value="10">dosen</option>
                                <option value="11">ormawa</option>
                                <option value="12">mahasiswa</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" ><i class="fas fa-highlighter"></i> Save</button>
                        </div>
                    </form>
        
          </div>
        </div>
      </div>