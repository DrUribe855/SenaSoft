@extends('adminlte::page')
@section('title', 'Cursos')

@section('content_header')
    <h1 class="ml-4 mt-3">Listado de cursos</h1>
@stop

@section('content')
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Horas</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td> {{$curso->id}} </td>
                    <td> {{$curso->nombre}} </td>
                    <td> {{$curso->horas}} </td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarCursos" @onclick="enviarDatos($curso)" id="enviarDatos">
                            Editar
                        </button> </td>
                    <td> <button class="btn btn-danger">Eliminar</button> </td>
                </tr>
            @endforeach
        </tbody>
    </table>


 {{-- Modals --}}

 @include('admin.cursos.ModalEditarCursos')


<script>

    const botonEditar = document.getElementById('enviarDatos');

    botonEditar.onclick = function(curso){
      
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
@stop