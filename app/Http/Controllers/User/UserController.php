<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listausuarios = User::all();
        return view('usuarios', compact(['listausuarios']));
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
        $usuario = new User([
            'name' => $request->nombreusuario,
            'email' => $request->emailusuario,
            'rol' => $request->rolusuario,
            'password' => bcrypt($request->passwordusuario)
        ]);

        $usuario->save();

        $listausuarios = User::all();

        return redirect()->route('usuarios.index', compact(['listausuarios', 'usuario']))
            ->with('usuario_creado','¡El usuario fue agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        //$user->productos()->attach(1,['accion'=>'retiro', 'cantidad'=>10]);
        //$user->save();

        $user->load('productos');

        return response()->json($user,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->nombreusuarioe;
        $usuario->email = $request->emailusuarioe;
        $usuario->rol = $request->rolusuarioedita;

        $usuario->save();

        $listausuarios = User::all();

        return redirect()->route('usuarios.index', compact(['listausuarios', 'usuario']))
            ->with('usuario_editado','¡El usuario fue editado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id != 1){
            $user->delete();

            $listausuarios = User::all();

            return redirect()->route('usuarios.index', compact(['user', 'listausuarios']))
                ->with('usuario_eliminado','¡Usuario Eliminad!');
        }else{
            $listausuarios = User::all();

            return redirect()->route('usuarios.index', compact(['user', 'listausuarios']))
                ->with('usuario_eliminado','¡No puede eliminar este usuario! Usuario por defecto.');
        }
    }
}
