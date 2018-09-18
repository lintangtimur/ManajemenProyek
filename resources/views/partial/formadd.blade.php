<h1>REGISTER</h1>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
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
                  <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>