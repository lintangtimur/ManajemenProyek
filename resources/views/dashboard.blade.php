<!DOCTYPE html>
<html lang="en">
<head>
    @include('partial.header')
</head>
<body>
    @include('partial.nav')
    <div id="content">
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
            </div>
        </div>
    </div>
    @include('partial.dependency')
</body>
</html>