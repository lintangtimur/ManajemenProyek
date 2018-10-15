<head>
<link rel="stylesheet" href="{{asset('css/sidebar.min.css')}}">

</head>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)"class="closebtn" onclick="closenav()">&times;</a>
    
    <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard <span class="sr-only">(current)</span></a>
                <span> @if(Auth::user()->roleid == 11)
                <a class="nav-link" href="/inputevent"><i class="fa fa-file"></i>Input Event</a>
                @endif
            </span>
    </div>
    <script>
    function opennav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("asu").style.marginLeft = "200px";
    
        
}
function closenav(){
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("asu").style.marginLeft="0";
    
}
    </script>
    <nav class="navbar navbar-expand-lg  navbar-light bg-light">
    <span class="navbar-brand" style="font-size:30px;cursor:pointer" onclick="opennav()">&#9776;NASM</span>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
</ul>
    <ul class=" navbar-nav navbar-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Hello, {{Session::get('username')}}</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</div>
</nav>
