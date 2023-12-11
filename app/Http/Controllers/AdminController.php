<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministerio;
use App\Models\Miembro;
use App\Models\User;
use App\Models\Asistencia;

class AdminController extends Controller
{
    public function index(){
        $ministerios = Ministerio::all();
        $miembros = Miembro::all();
        $usuarios = User::all();
        $asistencias = Asistencia::all();
        return view('index',['ministerios'=>$ministerios,
            'miembros'=>$miembros,
            'usuarios'=>$usuarios,
            'asistencias'=>$asistencias
            ]);
    }
}
