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

        <main>
            <div class="p-5 table-responsive">
                {{-- Btn Save --}}
                <a class="mr-3 btn btn-dark">Agregar Comentario</a>
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
                                <a href="" class="btn btn-warning btn-sm">Update</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
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
