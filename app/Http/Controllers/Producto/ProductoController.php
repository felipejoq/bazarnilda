<?php

namespace App\Http\Controllers\Producto;

use App\Bodega;
use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
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

        return view('productos',compact(['listaproductos','listacategorias','listabodegas']));
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

        $producto = new Producto([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'talla' => $request->talla,
            'cantidad' => $request->cantidad,
            'minimo' => $request->minimo,
            'categoria_id' => $request->categoria,
            'bodega_id' => $request->bodega,
            'barcode' => hexdec(uniqid())

        ]);

        $producto->save();

        $listaproductos = Producto::all();
        $listacategorias = Categoria::all();
        $listabodegas = Bodega::all();

        return redirect()->route('productos.index',compact(['listaproductos','listacategorias','listabodegas']))
            ->with('producto_agregado','¡El producto fue guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {

        $productov = $producto->load(['categoria','bodega','retiradas']);

        return response()->json($productov,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->nombre_productoe;
        $producto->descripcion = $request->descripcion_productoe;
        $producto->talla = $request->talla_productoe;
        $producto->cantidad = $request->cantidad_productoe;
        $producto->minimo = $request->minimo_productoe;
        $producto->categoria_id = $request->categoria_productoe;
        $producto->bodega_id = $request->bodega_productoe;

        $producto->save();

        $listaproductos = Producto::all();
        $listacategorias = Categoria::all();
        $listabodegas = Bodega::all();

        return redirect()->route('productos.index',compact(['listaproductos','listacategorias','listabodegas']))
            ->with('producto_editado','¡El producto fue editado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $productoeliminado = $producto->delete();

        return redirect()->route('productos.index',compact(['listaproductos','listacategorias','listabodegas']))
            ->with('producto_eliminado','¡El producto fue eliminado!');
    }
}
