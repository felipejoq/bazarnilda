<?php

namespace App\Http\Controllers\Bodega;

use App\Bodega;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listabodegas = Bodega::all();

        return view('bodegas', compact(['listabodegas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bodega = new Bodega([
            'nombre' => $request->nombrebodega,
            'descripcion' => $request->descripcionbodega,
            'numero' => $request->numerobodega
        ]);
        $bodega->save();

        $listabodegas = Bodega::all();

        return redirect()
            ->route('bodegas.index',compact(['listabodegas']))
            ->with('bodega_creada','¡Bodega creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function show(Bodega $bodega)
    {
        return response()->json($bodega,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function edit(Bodega $bodega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodega $bodega)
    {
        $bodega->nombre = $request->nombrebodegae;
        $bodega->numero = $request->numerobodegae;
        $bodega->descripcion = $request->descripcionbodegae;

        $bodega->save();

        $listabodegas = Bodega::all();

        return redirect()
            ->route('bodegas.index',compact(['listabodegas']))
            ->with('bodega_editada','¡Bodega Editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bodega $bodega)
    {

        if ($bodega->id != 1){
            $bodegaeliminada = $bodega->delete();

            $listabodegas = Bodega::all();

            return redirect()
                ->route('bodegas.index',compact(['listabodegas','bodegaeliminada']))
                ->with('bodega_eliminada','¡Bodega eliminada!');
        }else{
            $listabodegas = Bodega::all();

            return redirect()
                ->route('bodegas.index',compact(['listabodegas','bodegaeliminada']))
                ->with('bodega_eliminada','¡No de puede borrar!, es la bodega por defecto.');
        }


    }
}
