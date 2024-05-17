<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto&display=swap" rel="stylesheet">


</head>


<style>
   body{      
      font-family: "Roboto", sans-serif;
      font-weight: 400;
      font-style: normal;
      background: linear-gradient(#66af91, #66af91); 
  }

  .letra-menu{
    font-size: 20px;
    color: #001021;

  }

  .contenedor-menu{
    display: flex;
    flex-direction: row-reverse;
    justify-content:space-between;
  }

  .navbar-nav li {
    margin-left: 5%; /* Espacio entre elementos de la lista */
}

</style>

<header>
    <nav class="navbar navbar-expand-lg menu" style="background: #a2ca8e">
        <div class="container contenedor-menu">  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
    
                <li class="nav-item">
                  <a class="nav-link letra-menu" href="{{ $url = asset('/vista-cursos') }}">Cursos</a>
                </li>
    
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle letra-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorías
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item letra-menu" href="#">Software</a></li>
                    <li><a class="dropdown-item letra-menu" href="#">Marketing</a></li>
                    <li><a class="dropdown-item letra-menu" href="#">Arte</a></li>
                  </ul>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link letra-menu" href="#">Plataformas</a>
                </li>
    
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle letra-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Modo Administrador
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-categoria') }}">Categoria</a></li>
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-etiqueta') }}">Etiquetas</a></li>
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-avance') }}">Avance</a></li>
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-plataforma') }}">Plataforma</a></li>
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-profesor') }}">Profesores</a></li>
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-rol') }}">Roles</a></li>
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-usuario') }}">Usuarios</a></li>
                    <li><a class="dropdown-item letra-menu" href="{{ $url = asset('index-curso') }}">Cursos</a></li>
                  </ul>
                </li>
    
              </ul>
            </div>

              <a class="navbar-brand mb-0 h1" href="{{ asset('/') }}">
                <img src="{{ $url = asset('images/parrot.png') }}" width="80" height="100">
              </a>
           
        </div>
        
    </nav> 
</header>
  
   




