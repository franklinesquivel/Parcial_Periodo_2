<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cuenta;
use Illuminate\Support\Facades\Auth;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//Formulario de nueva cuenta
        $usuarios = User::where('user_type_id', '=', 'CLE')->get();
        return view('Cuenta.agregar_cuenta', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//Nueva cuenta
        $cuenta = new Cuenta();

        $cuenta->saldo = $request->input('monto');
        $cuenta->numCuenta = $request->input('numCuenta');
        $cuenta->user_id = $request->input('usuario');

        if($cuenta->save()){
            return redirect()->route('cuentas.create')->with('message', 'Registro exitoso!');
        }
        return redirect()->route('cuentas.create')->with('message', 'Registro no exitoso!');
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
    public function edit($num_cuenta)
    {
        $cuentas = Cuenta::where('user_id', '=', Auth::user()->id)->get();

        return View('Cuenta.modificar_cuenta')->with('cuentas', $cuentas);
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
