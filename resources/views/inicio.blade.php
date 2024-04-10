<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    

    
</head>
<body>
    
  
    
  
    

    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary"  style="background-color: aquamarine">
    <div class="container">  
      

        <a class="navbar-brand mb-0 h1" href="{{ asset('/') }}">
          <img src="{{ $url = asset('images/parrot.png') }}" width="80" height="100" class="d-inline align-top">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">

            <li class="nav-item">
              <a class="nav-link" href="#">Cursos</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorías
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Software</a></li>
                <li><a class="dropdown-item" href="#">Marketing</a></li>
                {{-- <li><hr class="dropdown-divider"></li> --}}
                <li><a class="dropdown-item" href="#">Arte</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Plataformas</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Modo Administrador
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ $url = asset('index-categoria') }}">Categoria</a></li>
                <li><a class="dropdown-item" href="#">Etiquetas</a></li>
                {{-- <li><hr class="dropdown-divider"></li> --}}
                <li><a class="dropdown-item" href="#">Avance</a></li>
                <li><a class="dropdown-item" href="#">Plataforma</a></li>
                <li><a class="dropdown-item" href="#">Cursos</a></li>
                <li><a class="dropdown-item" href="#">Profesores</a></li>
                <li><a class="dropdown-item" href="#">Roles</a></li>
                <li><a class="dropdown-item" href="#">Usuarios</a></li>
              </ul>
            </li>

            {{-- <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li> --}}
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar por nombre</button>
          </form>
        </div>
      </div>
    
    </nav>
 

    

      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
