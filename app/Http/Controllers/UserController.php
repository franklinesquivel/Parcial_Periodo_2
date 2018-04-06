<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Departamento;
use App\UserType;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(3);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::get();
        $tiposUsuarios = UserType::get();
        return view('auth.register', ['departamentos' => $departamentos, 'tiposUsuarios' => $tiposUsuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->nombre = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->email = $request->input('email');
        $user->dui = $request->input('dui');
        $user->password = bcrypt($request->input('password'));
        $user->fechaNac = $request->input('fechaNac');
        $user->direccion = $request->input('direccion');
        $user->telefono = $request->input('telefono');
        $user->municipio_id = $request->input('municipio');
        $user->user_type_id = $request->input('tipoUsuario');
        $user->edad = 20;
        
        $departamentos = Departamento::get();
        $tiposUsuarios = UserType::get();
        if($user->save()){
            return view('auth.register', ['departamentos' => $departamentos, 'tiposUsuarios' => $tiposUsuarios]);
        }
        return redirect()->route('auth.register', ['departamentos' => $departamentos, 'tiposUsuarios' => $tiposUsuarios])->with('message', 'Registro no exitoso!');
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
