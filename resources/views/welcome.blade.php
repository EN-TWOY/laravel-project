<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <nav class="navbar navbar-expand navbar-light bg-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active text-white" href="{{'/'}}" aria-current="page"
                    >PROYECTO LARAVEL<span class="visually-hidden">(current)</span></a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user.index') }}">Usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('comment.index') }}">Comentario</a>
            </li>
        </ul>
    </nav>

    <h1 class="text-center text-bold text-danger">CRUD en Laravel</h1>

    @if(session("success"))
        <div class="alert alert-success">{{session("success")}}</div>
    @endif

    @if(session("error"))
        <div class="alert alert-danger">{{session("error")}}</div>
    @endif

    <script>
        var res=function() {
            var not=confirm("Estas seguro de eliminar?");
            return not;
        }
    </script>

    <!-- Modal Save -->
    <div class="modal fade" id="modalSave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Guardar Datos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Form Save --}}
                    <form action="{{route("user.create")}}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" name="txtnombre">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" name="txtcorreo">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" name="txttelefono">
                            </div>
                        </div>
                        {{-- Btns --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 table-responsive">
        {{-- Btn Save --}}
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSave">Agregar</button>
        <a class="mr-3 btn btn-dark" href="{{ route('contact.index') }}">Ir a la página de contacto</a>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-success">
              <tr>
                <th class="text-center" scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($datos as $item)
                <tr>
                    <th class="text-center">{{$item->usuario_id}}</th>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->correo}}</td>
                    <td>{{$item->telefono}}</td>
                    <td class="text-center">
                        <a class="btn btn-warning btn-sm" 
                        data-bs-toggle="modal" data-bs-target="#modalUpdate{{$item->usuario_id}}">Update</a>
                        <a href="{{route("user.delete",$item->usuario_id)}}" onclick="return res()"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    
                    <!-- Modal Update -->
                    <div class="modal fade" id="modalUpdate{{$item->usuario_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Datos</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- Form Update --}}
                                    <form action="{{route("user.update")}}" method="POST">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="staticEmail" 
                                                name="txtcodigo" value="{{$item->usuario_id}}" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="staticEmail" 
                                                name="txtnombre" value="{{$item->nombre}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Correo</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="staticEmail" 
                                                name="txtcorreo" value="{{$item->correo}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="staticEmail" 
                                                name="txttelefono" value="{{$item->telefono}}">
                                            </div>
                                        </div>
                                        {{-- Btns --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>