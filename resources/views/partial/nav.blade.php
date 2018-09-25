<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#">NASM</a>
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                @if(Auth::user()->roleid == 11)
                <a class="nav-link" href="/inputevent">Input Event</a>
                @endif
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Hello, {{Session::get('username')}}</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</nav>