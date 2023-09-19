@extends('adminlte::page')
@section('title', 'Estudiantes')

@section('content_header')
    <h1 class="ml-4 mt-3">Listado de estudiantes</h1>
@stop

@section('content')
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td> {{$estudiante->nombre}} </td>
                    <td> {{$estudiante->apellido}} </td>
                    {{-- <td> {{$estudiante->horas}} </td> --}}
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar" @onclick="enviarDatos($estudiantes)" id="enviarDatos">
                            Editar
                        </button> </td>
                    <td> <button class="btn btn-danger">Eliminar</button> </td>
                </tr>
            @endforeach
        </tbody>
    </table>


 {{-- Modals --}}

 {{-- @include('admin.cursos.ModalEditar') --}}


<script>

    const botonEditar = document.getElementById('enviarDatos');

    botonEditar.onclick = function($estudiante){
      
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
@stop