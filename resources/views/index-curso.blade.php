<!DOCTYPE html>
<html lang="es">
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
  <style>
    body{      
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
    }

    .tabla-cursos{
      padding: 0 5%;
    }


    .table-bordered>:not(caption)>*>*{
      white-space: wrap; /* Evita que el texto se divida en varias líneas */
      overflow: hidden; /* Oculta el texto que se desborda del contenedor */
      text-overflow: ellipsis; 
      max-width:15px;
    }

  </style>

<body>

  @include('menu');

    <h1 class="text-center p-3" style="font-weight: bold;">Cursos</h1>
    <div class="table-responsive tabla-cursos">
        <div style="padding: 20px 20px 20px 1px;">
          <button data-bs-toggle="modal" data-bs-target="#crearModal" class="btn btn-primary">Nuevo</button>
        </div>

        <div>
            @if (session("correcto"))
                <div class="alert alert-success">{{ session("correcto") }}</div>
            @endif

            @if (session("incorrecto"))
                <div class="alert alert-danger">{{ session("incorrecto") }}</div>
            @endif

            <script>
              
              function confirmation(e) {
              e.preventDefault();

              var url = e.currentTarget.getAttribute('href')
              
              Swal.fire({
                    icon: 'warning',
                    title: '¿Estás seguro de eliminar este curso?',
                    text: '¡Esta acción no se puede revertir!',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: '¡Sí, eliminar!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href=url;
                    }
                })
              }
            </script>

        </div>

          <!-- Modal Crear Datos-->
          <div>

            <!-- Modal Crear Datos-->
            <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Nuevo Curso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  {{-- Contenido del Modal Crear --}}
                      <div class="modal-body">
                        <form action=" {{route("cursoCrud.store")}} " method="post">
                          @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre del curso</label>
                            <input type="text" class="form-control" id="txtNombreCurso" aria-describedby="emailHelp" name="txtNombreCurso">
                            
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Link del curso</label>
                            <input type="text" class="form-control" id="txtUrl" aria-describedby="emailHelp" name="txtUrl">
                            
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Año de publicacion del curso</label>
                            <input type="text" class="form-control" id="txtAño_publicacion" aria-describedby="emailHelp" name="txtAño_publicacion">
                            
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Direccion de Imagen del curso</label>
                            <input type="text" class="form-control" id="txtImagen_ref" aria-describedby="emailHelp" name="txtImagen_ref">
                            
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Profesor</label>
                            <select name="Id_profe" id="" class="form-control">
                              @foreach($profesorData as $profesor)
                              <option value="{{ $profesor->id }}">{{ $profesor->nombre_profesor }}</option>
                              @endforeach
                            </select>
                            
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Plataforma</label>
                            <select name="Id_plataforma" id="" class="form-control">
                              @foreach($plataformaData as $plataforma)
                              <option value="{{ $plataforma->id }}">{{ $plataforma->nombre_plataforma }}</option>
                              @endforeach
                            </select>
                            
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Avance</label>
                            <select name="Id_avance" id="" class="form-control">
                              @foreach($avanceData as $avance)
                              <option value="{{ $avance->id }}">{{ $avance->avance }}</option>
                              @endforeach
                            </select>
                            
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Categoria</label>
                            <select name="Id_categoria" id="" class="form-control">
                              @foreach($categoriaData as $categoria)
                              <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                              @endforeach
                            </select>
                            
                          </div>

                          <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"  >Crear</button>
                          </div>

                        </form>
                      </div>


                  
                </div>
              </div>
            </div>

            
          </div>
          
          <div style="padding: 0 0 4% 0">
              <form action="">
                  <div class="form-row" style="display: flex; gap:10px; justify-content:end;">
                      <div class="col-sm-3">
                          <input type="text" class="form-control" name="buscadorNombreCurso" value="{{ $buscadorNombreCurso }}" placeholder="Nombre del curso">
                      </div>
                      <div class="col-auto">
                          <input type="submit" class="btn btn-warning" value="Buscar">
                      </div>
                  </div>
              </form>
          
          </div>

        <table class="table table-bordered table-hover border-secondary">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">TITULO</th>
                <th scope="col">LINK</th>
                <th scope="col">AÑO</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">PROFESOR</th>
                <th scope="col">PLATAFORMA</th>
                <th scope="col">AVANCE</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">ACCIÓN</th>
              </tr>
            </thead>

            <tbody>
              @if(count($cursoData)<=0)
              <div style="padding:250px 0">
                  <h2 style="font-weight: 500;">No hay resultados :(</h2>
              </div>
              @else
              @foreach ($cursoData as $item)
              <tr>
                <th  >{{$item->id}}</th>
                <td  >{{$item->titulo}}</td>
                <td > <span class="col__links"> {{$item->url}} </span> </td>
                <td  >{{$item->anio_publicacion}}</td>
                <td  >{{$item->imagen_ref}}</td>
                <td  >{{$item->selectProfesor->nombre_profesor}}</td>
                <td  >{{$item->selectPlataforma->nombre_plataforma}}</td>
                <td  >{{$item->selectAvance->avance}}</td>
                <td  >{{$item->selectCategoria->nombre_categoria}}</td>
                <td  >
                  <div class="text-center " style="display:flex; gap: 2px;">
                    <a href="" data-bs-toggle="modal" data-bs-target="#editarModal{{$item->id}}" style="margin-right: 2px;" class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen-to-square"></i> </a>
                    <a href=" {{ route("cursoCrud.delete",$item->id) }} " onclick="confirmation(event)" style="margin-right: 2px;" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i> </a>
                  </div>
                    
                </td>

                  <!-- Modal Editar Datos-->
                  <div>

                    <!-- Modal Modificar Datos-->
                    <div class="modal fade" id="editarModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Datos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          {{-- Contenido del Modal Editar --}}
                              <div class="modal-body">
                                <form action="{{ route('cursoCrud.update', ['id' => $item->id]) }}" method="POST">
                                  @csrf
                                  
                                  <input type="hidden" name="id" value="{{ $item->id }}">
                                  
                                  <div class="mb-3">

                                    <label for="exampleInputEmail1" class="form-label">Nombre del curso</label>
                                    <input type="text" class="form-control" id="txtNombreCurso" name="txtNombreCurso" value="{{ $item->titulo }}">

                                    <label for="exampleInputEmail1" class="form-label">Link del Curso</label>
                                    <input type="text" class="form-control" id="txtUrl" name="txtUrl" value="{{ $item->url }}">

                                    <label for="exampleInputEmail1" class="form-label">Año de publicacion</label>
                                    <input type="text" class="form-control" id="txtAño_publicacion" name="txtAño_publicacion" value="{{ $item->anio_publicacion }}">

                                    <label for="exampleInputEmail1" class="form-label">Link de Imagen</label>
                                    <input type="text" class="form-control" id="txtImagen_ref" name="txtImagen_ref" value="{{ $item->imagen_ref }}">

                                    <label for="exampleInputEmail1" class="form-label">Profesor</label>
                                    <select name="Id_profe" id="Id_profe" class="form-control" >
                                      @foreach($profesorData as $profesor)
                                        @if($profesor->id==$item->id_profe)
                                          <option value="{{ $profesor->id }}" selected>{{ $profesor->nombre_profesor }}</option>
                                        @else
                                        <option value="{{ $profesor->id }}" >{{ $profesor->nombre_profesor }}</option>
                                        @endif
                                      @endforeach
                                    </select>

                                    <label for="exampleInputEmail1" class="form-label">Plataforma</label>
                                    <select name="Id_plataforma" id="Id_plataforma" class="form-control">
                                      @foreach($plataformaData as $plataforma)
                                        @if($plataforma->id==$item->id_plataforma)
                                          <option value="{{ $plataforma->id }}" selected>{{ $plataforma->nombre_plataforma }}</option>
                                        @else
                                        <option value="{{ $plataforma->id }}" >{{ $plataforma->nombre_plataforma }}</option>
                                        @endif
                                      @endforeach
                                    </select>

                                    <label for="exampleInputEmail1" class="form-label">Avance</label>
                                    <select name="Id_avance" id="Id_avance" class="form-control">
                                      @foreach($avanceData as $avance)
                                        @if($avance->id==$item->id_nivel)
                                          <option value="{{ $avance->id }}" selected>{{ $avance->avance }}</option>
                                        @else
                                        <option value="{{ $avance->id }}" >{{ $avance->avance }}</option>
                                        @endif
                                      @endforeach
                                    </select>

                                    <label for="exampleInputEmail1" class="form-label">Avance</label>
                                    <select name="Id_categoria" id="Id_categoria" class="form-control">
                                      @foreach($categoriaData as $categoria)
                                        @if($categoria->id==$item->id_categoria)
                                          <option value="{{ $categoria->id }}" selected>{{ $categoria->nombre_categoria }}</option>
                                        @else
                                        <option value="{{ $categoria->id }}" >{{ $categoria->nombre_categoria }}</option>
                                        @endif
                                      @endforeach
                                    </select>

                                    
                                  </div>

                                  <div class="modal-footer" style="gap: 20px" >
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar datos</button>
                                  </div>

                                </form>
                              </div>


                          
                        </div>
                      </div>
                    </div>

                    
                  </div>

                  

              </tr> 
              @endforeach
              @endif
            </tbody>
          </table>
            
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
