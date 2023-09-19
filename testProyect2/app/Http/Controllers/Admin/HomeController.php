<?php

namespace App\Http\Controllers\Admin;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
    }

    public function registrarCurso(){
        // code...
    }

    public function listarCursos(){
        $cursos = Curso::get();
        // dd($cursos);
        return view('admin.cursos.ListadoCursos',['cursos' => $cursos]);
    }

    public function editarCursos(Request $request, Curso $curso){
        // $request -> $validate([
        //     'id' => ['required'],
        //     'nombre' => ['required'],
        //     'horas' => ['required']
        // ]);

        // $curso->id = $request->input('id');
        $curso->nombre = $request->input('nombre');
        $curso->horas = $request->input('horas');
        $curso->save();

        $cursos = Curso::get();

        return view('admin.cursos.ListadoCursos',['cursos' => $cursos]);
    }

    public function listarEstudiantes(){
        $estudiantes = Estudiante::get();
        return view('admin.estudiantes.ListadoEstudiantes', ['estudiantes' => $estudiantes]);
    }

}
