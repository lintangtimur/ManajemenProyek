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
                @yield('inputevent')
            </div>
        </div>
    </div>
    @include('partial.dependency')
</body>
</html>