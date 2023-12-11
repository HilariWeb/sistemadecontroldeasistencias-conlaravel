<?php

namespace App\Http\Controllers;

use App\Models\Ministerio;
use Illuminate\Http\Request;

class MinisterioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ministerios = Ministerio::all();
        return view('ministerios.index',['ministerios'=>$ministerios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ministerios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$ministerio = request()->all();
       // return response()->json($ministerio);
        $request->validate([
            'nombre_ministerio'=>'required',
            'fecha_ingreso'=>'required',
        ]);

        $ministerio = new Ministerio();
        $ministerio->nombre_ministerio = $request->nombre_ministerio;
        $ministerio->descripcion = $request->descripcion;
        $ministerio->estado = '1';
        $ministerio->fecha_ingreso = $request->fecha_ingreso;
        $ministerio->save();

        return redirect()->route('ministerios.index')->with('mensaje','Se registro el ministerios de la manera correcta');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ministerio = Ministerio::findOrFail($id);
        return view('ministerios.show',['ministerio'=>$ministerio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ministerio = Ministerio::findOrFail($id);
        return view('ministerios.edit',['ministerio'=>$ministerio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_ministerio'=>'required',
            'fecha_ingreso'=>'required',
        ]);

        $ministerio = Ministerio::find($id);
        $ministerio->nombre_ministerio = $request->nombre_ministerio;
        $ministerio->descripcion = $request->descripcion;
        $ministerio->fecha_ingreso = $request->fecha_ingreso;
        $ministerio->save();

        return redirect()->route('ministerios.index')->with('mensaje','Se actualizo el ministerio de la manera correcta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ministerio::destroy($id);
        return redirect()->route('ministerios.index')->with('mensaje','Se elimino el ministerio de la manera correcta');
    }
}
