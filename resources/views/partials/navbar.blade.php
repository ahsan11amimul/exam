<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Coding Test</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/employees">Employee</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="{{url('/info')}}">Employee Info</a>
        </li>
       
     
      </ul>
       <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
         @auth
        <li class="nav-item">
          <a class="nav-link"  href="#">{{auth()->user()->username}}</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link"  href="{{url('/logout')}}">Logout</a>
        </li>  
         @endauth
         @guest
         <li class="nav-item">
          <a class="nav-link"  href="{{url('/login/create')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/register/create')}}">Register</a>
        </li>  
         @endguest
       
       
     
      </ul>
     
    </div>
  </div>
</nav>