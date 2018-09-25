<!DOCTYPE html>
<html lang="en">
<head>
    @include('partial.header')
</head>
<body>
    <div class="container">
        <div class="row">
            
            <div class="col-md-4">                
            
            <h1>LOGIN</h1>
                <form action="/login" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" id="user" class="form-control" placeholder="masukkan username anda" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" id="pass" class="form-control" placeholder="pass" aria-describedby="helpId">                                  
                    </div>
                    <button type="submit" class="btn btn-info">LOGIN</button>
                </form>
                @include('partial.error')
            </div>

            <!-- login-->
            <div class="col-md-8">
                <h1>Upcoming Event</h1>
            </div>
    </div>

    @include('partial.dependency')
</body>
</html>