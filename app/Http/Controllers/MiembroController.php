<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MiembroController extends Controller
{
    public function index(){
        $miembros = Miembro::all()->sortByDesc('id');
        return view ('miembros.index',['miembros'=>$miembros]);
    }

    public function create(){
        return view ('miembros.create');
    }

    public function store(Request $request){
        //$miembro = request()->all();
        //return response()->json($miembro);

        $request->validate([
            'nombre_apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required',
            'ministerio' => 'required',
        ]);

        $miembro = new Miembro();

        $miembro->nombre_apellido = $request->nombre_apellido;
        $miembro->direccion = $request->direccion;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->genero = $request->genero;
        $miembro->email = $request->email;
        $miembro->estado = '1';
        $miembro->ministerio = $request->ministerio;

        if($request->hasFile('fotografia')){
            $miembro->fotografia = $request->file('fotografia')->store('fotografias_miembros','public');
        }
        //$miembro->fotografia = $request->fotografia;
        $miembro->fecha_ingreso = date($format = 'Y-m-d');

        $miembro->save();

        return redirect()->route('miembros.index')->with('mensaje','Se registro al miembro de la manera correcta');

    }

    public function show($id){
        $miembro = Miembro::findOrFail($id);

       // return response()->json($miembro);
        return view ('miembros.show',['miembro'=>$miembro]);
    }

    public function edit($id){
        $miembro = Miembro::findOrFail($id);
        return view ('miembros.edit',['miembro'=>$miembro]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre_apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required',
            'ministerio' => 'required',
        ]);

        $miembro = Miembro::find($id);

        $miembro->nombre_apellido = $request->nombre_apellido;
        $miembro->direccion = $request->direccion;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->genero = $request->genero;
        $miembro->email = $request->email;
        $miembro->ministerio = $request->ministerio;

        if($request->hasFile('fotografia')){
            Storage::delete('public/'.$miembro->fotografia);
            $miembro->fotografia = $request->file('fotografia')->store('fotografias_miembros','public');
        }

        $miembro->save();

        return redirect()->route('miembros.index')->with('mensaje','Se actualizo al miembro de la manera correcta');

    }

    public function destroy($id){
        $miembro = Miembro::find($id);
        Storage::delete('public/'.$miembro->fotografia);
        Miembro::destroy($id);
        return redirect()->route('miembros.index')->with('mensaje','Se elimino al miembro de la manera correcta');
    }
}
