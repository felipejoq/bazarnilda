<?php

namespace App\Http\Controllers\Categoria;

use App\Bodega;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listadecategorias = Categoria::all();
        $listadebodegas = Bodega::all();

        return view('categorias', compact(['listadecategorias','listadebodegas']));
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

        $categoria = new Categoria();
        $categoria->nombre = $request->nombrecategoria;
        $categoria->descripcion = $request->descripcioncategoria;
        $categoria->save();

        $categoriacreada = $categoria;

        $listadecategorias = Categoria::all();
        $listadebodegas = Bodega::all();

        return redirect()
            ->route('categorias.index',compact(['categoriacreada','listadecategorias','listadebodegas']))
            ->with('flash','¡Categoría creada!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return response()->json($categoria,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->nombre = $request->nombrecategoriae;
        $categoria->descripcion = $request->descripcioncategoriae;
        $categoria->save();

        $listadecategorias = Categoria::all();
        $listadebodegas = Bodega::all();

        return redirect()
            ->route('categorias.index',compact(['categoria','listadecategorias','listadebodegas']))
            ->with('editada','¡Categoría editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        if ($categoria->id != 1){
            $categoriaelininada = $categoria->delete();

            $listadecategorias = Categoria::all();
            $listadebodegas = Bodega::all();

            return redirect()
                ->route('categorias.index',compact(['categoriaelininada','listadecategorias','listadebodegas']))
                ->with('eliminada','¡Categoría eliminada!');
        }else{
            $listadecategorias = Categoria::all();
            $listadebodegas = Bodega::all();

            return redirect()
                ->route('categorias.index',compact(['listadecategorias','listadebodegas']))
                ->with('eliminada','¡No de puede borrar!, es la categoría por defecto.');
        }
    }
}
