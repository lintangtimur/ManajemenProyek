<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    @include('partial.header')
    
    <link rel="stylesheet" href="{{asset('css/tampilantimeline.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/tampilanlogin.min.css')}}">

</head>
<body>

<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-4">
                    <div id="login-box" class="col-md-8">
                <h1>Login </h1><br>
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
            </div>
</div>

</div>
</div>


            <!-- Upcoming event-->
    <div class="col-md-8">
    <header class="page-header">
        <h1>UpComing Event</h1>
    </header>
  
  <ul class="timeline">
    <li><div class="tldate">september 2018</div></li>
    
    <li>
      <div class="tl-circ"></div>
      <div class="timeline-panel">
        <div class="tl-heading">
          <h4>MP</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 25/9/2018</small></p>
        </div>
        <div class="tl-body">
          <p>pertemuan 5 </p>
        </div>
      </div>
    </li>
    
    <li class="timeline-inverted">
      <div class="tl-circ"></div>
      <div class="timeline-panel ">
        <div class="tl-heading">
          <h4>Project NASM Login</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 23/9/2018</small></p>
        </div>
        <div class="tl-body">
          <p>Tester Login</p>
            
        
        </div>
      </div>
    </li>
    
    <li><div class="tldate">Oktober 2018</div></li>
    
    <li>
      <div class="tl-circ"></div>
      <div class="timeline-panel">
        <div class="tl-heading">
          <h4> SKS</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>1/10/2018 </small></p>
        </div>
        <div class="tl-body">
          <p>Batas Bayar SKS tanpa denda</p>
        </div>
      </div>
    </li>
    <li class="timeline-inverted">
      <div class="timeline-panel noarrow">
        <div class="tl-heading">
          <h4>No icon here</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 16/10/2018</small></p>
        </div>
        <div class="tl-body">
          <p>Here you'll find some beautiful photography for your viewing pleasure, courtesy of <a href="http://lorempixel.com/">lorempixel</a>.</p>
          
          <p><img src="http://lorempixel.com/600/300/nightlife/" alt="lorem pixel"></p>
        </div>
      </div>
    </li>
    <li>
      <div class="tl-circ"></div>
      <div class="timeline-panel">
        <div class="tl-heading">
          <h4>Some Important Date!</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/03/2014</small></p>
        </div>
        <div class="tl-body">
          <p>Write up a quick summary of the event.</p>
        </div>
      </div>
    </li>
    <li>
      <div class="timeline-panel noarrow">
        <div class="tl-heading">
          <h4>Secondary Timeline Box</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3/01/2014</small></p>
        </div>
        <div class="tl-body">
          <p>This might be a follow-up post with related info. Maybe we include some extra links, tweets, user comments, photos, etc.</p>
        </div>
      </div>
    </li>
    
    <li><div class="tldate">Feb 2014</div></li>
    
    <li class="timeline-inverted">
      <div class="tl-circ"></div>
      <div class="timeline-panel">
        <div class="tl-heading">
          <h4>The Winter Months</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 02/23/2014</small></p>
        </div>
        <div class="tl-body">
          <p>Gee time really flies when you're having fun.</p>
        </div>
      </div>
    </li>
    
  </ul>
  
            </div>
    </div>

    @include('partial.dependency')
</body>
</html>