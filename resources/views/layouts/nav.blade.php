<nav class="navbar navbar-expand-md  avbar-inverse navbar-dark fixed-top bg-dark n">
      <a class="navbar-brand" href="/">Reservation</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/salons">Salons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          </ul>
          @if(Auth::check())
            
          <ul class="nav navbar-nav  ml-auto">
                  <li><a href="/client/reservations/confirmer" class="nav-link "><span class="badge">Welcome</span> {{strtoupper(Auth::user()->name)}}</a></li>
                  <li><a href="/logout" class="nav-link active "></span> Logout</a></li>
          </ul>
          @endif
          
          
          @if(!Auth::check())
          <ul class="nav navbar-nav  ml-auto">
                      <li><a href="/login" class="nav-link active"> Login</a></li>
                      <li><a href="/singup" class="nav-link "> Singup</a></li>
              </ul>
          @endif

      
        
          
      </div>
    </nav>

