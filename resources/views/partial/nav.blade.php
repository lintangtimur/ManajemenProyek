    <nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-white rounded navbar-light bg-light">
    <span class="navbar-brand">NASM v1.1.3</span>
    <div class="wrapper">
        <div class="main_sidebar mt-4">
            
           <ul>
           <li class=" kiri">
            <i class="fas fa-users"></i> Hello, {{Session::get('username')}}</li>
                <li  ><a href="/dashboard"
                    @if(Request::is('dashboard'))
                    class="activeMenu"
                    @endif
                    ><i class="fas fa-home "></i>Dashboard  <span class="sr-only">(current)</span></a></li>
                
                @if(Auth::user()->roleid == 10)
                <li ><a href="/dashboard/mahasiswa"
                    @if(Request::is('dashboard/mahasiswa'))
                    class="activeMenu"
                    @endif
                    ><i class="fas fa-user "></i>Mahasiswa</a></li>
                @endif
                <li class="kiri2">
                    @if(Auth::user()->roleid == 11)
                        <a  href="/inputevent" class="{{ Request::segment(1) === 'inputevent' ? 'activeMenu' : null }}"><i class="fas fa-copy"></i>Input Event</a>
                    @endif
                    
                </li>
            <li class="kiri">
            
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            
        </li>

            </ul>
        </div>

    </div>
   
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
</ul>

    <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Hello, {{Session::get('username')}}</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>

</div>
</nav>
