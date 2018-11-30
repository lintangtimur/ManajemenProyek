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
            {{-- <div id="ero">
                <h3 class="display-5">General Settings</h3>
                <div class="card shadow p-3 mb-5 bg-white rounded">                    
                    <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <form>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Student Email</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="default is student.unika.ac.id">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-4 col-form-label">Max Upcoming Event</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="default is 9">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                      </small>
                              </div>
                              
                            </div>
                            <fieldset class="form-group">
                              <div class="row">
                                <legend class="col-form-label col-sm-4 pt-0">Allowed File Type</legend>
                                <div class="col-sm-8">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                      JPEG, PNG, PDF
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                      DOCX, DOC, PDF
                                    </label>
                                  </div>
                                  <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                    <label class="form-check-label" for="gridRadios3">
                                      Third disabled radio
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </fieldset>
                            <div class="form-group row">
                              <div class="col-sm-3">Checkbox</div>
                              <div class="col-sm-9">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                                  <label class="form-check-label" for="gridCheck1">
                                    Example checkbox
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div> --}}
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