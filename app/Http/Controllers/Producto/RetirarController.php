<?php

namespace App\Http\Controllers\Producto;

use App\Bodega;
use App\Categoria;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RetirarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaproductos = Producto::all();
        $listacategorias = Categoria::all();
        $listabodegas = Bodega::all();

        return view('retirarproductos',compact(['listaproductos','listacategorias','listabodegas']));
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

        $producto = Producto::findOrFail($request->productoid);

        if ($producto->cantidad >= $request->cantidadretira){

            $producto->cantidad = $producto->cantidad - $request->cantidadretira;

            $producto->retiradas()->attach($request->user_id,['accion'=>$request->accion, 'cantidad'=> $request->cantidadretira]);
            $producto->save();

            $listaproductos = Producto::all();

            return redirect()->route('retirarproductos.index', compact(['listaproductos']))
                ->with('retiro_exitoso','Se descontó el stock.');
        }else{
            $listaproductos = Producto::all();

            return redirect()->route('retirarproductos.index', compact(['listaproductos']))
                ->with('retiro_exitoso','No puede retirar esa cantidad, porque no hay suficiente stock');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
