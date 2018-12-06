
<nav class="navbar navbar-expand-md  avbar-inverse navbar-dark fixed-top bg-dark n">
      <a class="navbar-brand" href="/administration">RV Administration</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ">

          <li class="nav-item ">
            <a class="nav-link " href="/administration/reservations">Reservations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/administration/salons">Salons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/administration/coiffeurs">coiffeurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/administration/prestations">prestations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/administration/Statistiques">Statistiques</a>
          </li>
          </ul>
      
          
            
            <ul class="nav navbar-nav  ml-auto">
                    <li><a href="/administration" class="nav-link "><span class="badge">Welcome Admin</span> {{strtoupper(Auth::guard('admin')->user()->name)}}</a></li>
                    <li><a href="/adminLogout" class="nav-link active "></span> Logout</a></li>
            </ul>
           
            
            
      </div>
    </nav>

          
    