<header>
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
                    <li><a class="dropdown-item" href="{{ $url = asset('index-etiqueta') }}">Etiquetas</a></li>
                    {{-- <li><hr class="dropdown-divider"></li> --}}
                    <li><a class="dropdown-item" href="{{ $url = asset('index-avance') }}">Avance</a></li>
                    <li><a class="dropdown-item" href="{{ $url = asset('index-plataforma') }}">Plataforma</a></li>
                    <li><a class="dropdown-item" href="{{ $url = asset('index-profesor') }}">Profesores</a></li>
                    <li><a class="dropdown-item" href="{{ $url = asset('index-rol') }}">Roles</a></li>
                    <li><a class="dropdown-item" href="{{ $url = asset('index-usuario') }}">Usuarios</a></li>
                    <li><a class="dropdown-item" href="#">Cursos</a></li>
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
</header>
  
   




