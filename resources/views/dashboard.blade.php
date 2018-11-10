<!DOCTYPE html>
<html lang="en">
<head>
    @include('partial.header')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<body>
    @include('partial.nav')
    <div id="content">
    <div id="asu">
        <div class="container mt-4">
            <div class="row">
                @if($role == 'admin')
                @include('dashboard.admin')
                @endif
                @if($role == 'dosen')
                @include('dashboard.dosen')
                @endif
                @if($role == 'ormawa')
                @include('dashboard.ormawa')
                @endif
                @if($role == 'mahasiswa')
                @include('dashboard.mahasiswa')
                @endif
            </div>
        </div>
    </div>
    </div>
    @include('partial.dependency')

</body>
</html>