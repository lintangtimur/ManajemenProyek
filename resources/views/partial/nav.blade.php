<head>
<link rel="stylesheet" href="{{asset('css/sidebar.min.css')}}">

</head>
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)"class="closebtn" onclick="closenav()">&times;</a>
    
    <a href="/dashboard"><i class="fas fa-dashboard">Dashboard <span class="sr-only">(current)</span></i></a>
                <span> @if(Auth::user()->roleid == 11)
                <a class="nav-link" href="/inputevent"><i class="fas fa-file">Input Event</i></a>
                @endif
            </span>
    </div>
    <script>
    function opennav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("asu").style.marginLeft = "120px";
    document.getElementById("asu2").style.marginLeft="250px";
        
}
function closenav(){
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("asu").style.marginLeft="0";
    document.getElementById("asu2").style.marginLeft="0";
}
    </script>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
    <span class="navbar-brand" style="font-size:30px;cursor:pointer" onclick="opennav()">&#9776;NASM</span>
    <div id="asu">
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
