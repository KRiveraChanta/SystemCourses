<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cursos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/d11aeb8d8f.js" crossorigin="anonymous"></script>

</head>
<body>
    <style>
        body{      
          font-family: "Montserrat", sans-serif;
          font-optical-sizing: auto;
          font-style: normal;
        }
    
      </style>

    @include('menu');

    <main>
    <h1 class="text-center p-3" style="font-weight: bold;">Varios Cursos</h1>
    </main>

    <div style="display:flex; padding: 0 15%;">
      @foreach ($cursoData as $item)
          <div class="card" style="width: 18rem; margin:10px;">
              @if (strpos($item->imagen_ref, 'youtube.com') !== false || strpos($item->imagen_ref, 'youtu.be') !== false)
                  @php
                      // Extraer el ID del video de YouTube del enlace proporcionado
                      $videoId = substr(parse_url($item->imagen_ref, PHP_URL_QUERY), 2); // Extraer solo el ID del video
  
                      // Construir la URL de la miniatura del video de alta calidad
                      $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
  
                      // Si no hay miniatura de alta calidad, usar la predeterminada
                      if (!get_headers($thumbnailUrl)) {
                          $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/default.jpg";
                      }
                  @endphp
                  <img class="card-img-top" src="{{ $thumbnailUrl }}" alt="Card image cap">
              @else
                  <img class="card-img-top" src="{{ $item->imagen_ref }}" alt="Card image cap">
              @endif
              <div class="card-body">
                  <h5 class="card-title" style="font-weight: 700;"> {{$item->titulo}} </h5>
                  <p class="card-text" style="color:blue;">{{$item->anio_publicacion}}</p>
                  <p class="card-text">{{$item->selectProfesor->nombre_profesor}}</p>
                  <p class="card-text">{{$item->selectPlataforma->nombre_plataforma}}</p>
                  <a href="{{$item->url}}" target="_blank" class="btn btn-primary">Abrir link del curso</a>
              </div>
          </div>
      @endforeach
  </div>
  
  
  
  <div class="pagination justify-content-center">
    <ul class="pagination">
        @if ($cursoData->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo; Anterior</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $cursoData->previousPageUrl() }}" rel="prev">&laquo; Anterior</a>
            </li>
        @endif

        @for ($page = 1; $page <= $cursoData->lastPage(); $page++)
            <li class="page-item {{ $page == $cursoData->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $cursoData->url($page) }}">{{ $page }}</a>
            </li>
        @endfor

        @if ($cursoData->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $cursoData->nextPageUrl() }}" rel="next">Siguiente &raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Siguiente &raquo;</span>
            </li>
        @endif
    </ul>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>