<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etiquetas</title>
    
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
  </style>

<body>

  @include('menu');

    <h1 class="text-center p-3" style="font-weight: bold;">Etiquetas</h1>


    <div style="padding: 0px 20%;" class="table-responsive">
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
                    title: '¿Estás seguro?',
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Nueva Etiqueta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  {{-- Contenido del Modal Crear --}}
                      <div class="modal-body">
                        <form action=" {{route("crud.create")}} " method="post">
                          @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de la etiqueta</label>
                            <input type="text" class="form-control" id="txtNombreEtiqueta" aria-describedby="emailHelp" name="txtNombreEtiqueta">
                            
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                          </div>

                        </form>
                      </div>


                  
                </div>
              </div>
            </div>

            
          </div>


        <table class="table table-striped table-bordered table-hover border-secondary">
            <thead class="table-dark">
              <tr>
                <th scope="col">CÓDIGO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">ACCIÓN</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($etiquetaData as $item)
              <tr>
                <th>{{$item->id}}</th>
                <td>{{$item->nombre_etiqueta}}</td>
                <td>
                  <div class="text-center">
                    <a href="" data-bs-toggle="modal" data-bs-target="#editarModal{{$item->id}}" class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen-to-square"></i> </a>
                    <a href=" {{ route("crud.delete",$item->id) }} " onclick="confirmation(event)" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i> </a>
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
                                <form action="{{route("crud.update")}}" method="POST">
                                  @csrf
                                  <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Código de la etiqueta</label>
                                    <input type="text" class="form-control" id="txtIdEtiqueta" name="txtIdEtiqueta" value="{{ $item->id }}" readonly>

                                    <label for="exampleInputEmail1" class="form-label">Nombre de la etiqueta</label>
                                    <input type="text" class="form-control" id="txtNombreEtiqueta" name="txtNombreEtiqueta" value="{{ $item->nombre_etiqueta }}">
                                    
                                  </div>

                                  <div class="modal-footer">
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

            </tbody>
          </table>
            
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
