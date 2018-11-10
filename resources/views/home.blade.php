<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    @include('partial.header')
    <link rel="stylesheet" href="{{asset('css/tampilantimeline.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/tampilanlogin.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="panel panel-primary mt-4">
                    <div class="panel-heading">
                    {{-- <h3 class="panel-title">Login</h3> --}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 separator social-login-box">
                            <h4>Login Mahasiswa</h4>
                            <a href="/redirect" class="btn google btn-block" type="button"><i class="fab fa-google"></i>Login With Student Unika</a>
                        </div>
                        <div class="col-sm-6 col-md-6 login-box">
                            <form action="/login" method="post" role="form">
                                {{ csrf_field() }}
                                <h4>Login Untuk Dosen atau Ormawa </h4>
                                <div class="form-group">
                                    <label for="user">Username</label>
                                    <input type="text" name="user" id="user" class="form-control" placeholder="masukkan username anda" aria-describedby="helpId" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" name="password" id="pass" class="form-control" placeholder="Masukkan Password anda" aria-describedby="helpId" >                                  
                                </div>
                                <button type="submit" class="btn btn-info">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>              
                @include('partial.error')
            </div>
        </div>
    </div>

            <!-- Upcoming event-->
    <div class="col-md-8">
        <header class="page-header">
            <h1>UpComing Event</h1>
        </header>
        <div class="main-timeline7">
            @foreach ($kegiatanApproved as $item)
            <div class="timeline">
                <div class="timeline-icon"><i class="fa fa-calendar"></i></div>
                <span class="year">{{$item->tanggalAcara->format('d M y')}}</span>
                <div class="timeline-content">
                    <h5 class="title">{{$item->namaAcara}}</h5>
                    <p class="description">
                        {{$item->temaAcara}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('partial.dependency')
</body>
</html>