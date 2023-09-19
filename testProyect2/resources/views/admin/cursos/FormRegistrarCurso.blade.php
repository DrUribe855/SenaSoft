@extends('adminlte::page')
@section('title', 'Cursos')

@section('content_header')
    <h1 class="ml-4 mt-3">Listado de cursos</h1>
@stop

@section('content')
    <section>
        <form>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre">
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido">
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto">
            </div>
        </form>
    </section>
@stop