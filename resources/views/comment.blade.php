<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>

        <script>
            var res=function() {
                var not=confirm("Estas seguro de eliminar?");
                return not;
            }
        </script>

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
                        <form action="{{route("comment.create")}}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Contenido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" name="txtcontenido">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="staticEmail" name="txtfecha">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Usuario</label>
                                <select class="col-sm-10">
                                    @foreach($users as $us)
                                        <option value="{{$us->usuario_id}}">
                                            {{$us->nombre}}
                                        </option>
                                    @endforeach
                                </select>
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

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session("error"))
            <div class="alert alert-danger">
                {{session("error")}}
            </div>
        @endif

        <main>
            <div class="p-5 table-responsive">
                {{-- Btn Save --}}
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSave">Agregar</button>
                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-success">
                      <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Usuario</th>
                        <th class="text-center" scope="col">Action</th>
                      </tr>
                    </thead> 
                    <tbody>
                        @foreach($comments as $item)
                        <tr>
                            <th class="text-center">{{$item->comentario_id}}</th>
                            <td>{{$item->contenido}}</td>
                            <td>{{$item->fecha_comentario}}</td>
                            <td>{{$item->usuario->nombre}}</td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" data-bs-target="#modalUpdate{{$item->comentario_id}}">Update</a>
                                    <a href="{{route("user.delete",$item->comentario_id)}}" onclick="return res()"
                                        class="btn btn-danger btn-sm">Delete</a>
                            </td>

                            <!-- Modal Update -->
                            <div class="modal fade" id="modalUpdate{{$item->comentario_id}}"" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Guardar Datos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- Form Update --}}
                                            <form action="{{route("comment.update")}}" method="POST">
                                                @csrf
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$item->comentario_id}}"
                                                        id="staticEmail">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Contenido</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$item->contenido}}"
                                                        id="staticEmail" name="txtcontenido">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="{{$item->fecha_comentario}}"
                                                        id="staticEmail" name="txtfecha">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Usuario</label>
                                                    <select class="col-sm-10" name="txtusuario">
                                                        @foreach($users as $us)
                                                            <option value="{{$us->usuario_id}}">
                                                                {{$us->nombre}}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
        </main>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
