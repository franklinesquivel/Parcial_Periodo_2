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
        $cuenta->numCuenta = $request->input('cuenta');
        $cuenta->user_id = auth()->user()->id;

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
    public function edit($accion)
    {
        $cuentas = Cuenta::where('user_id', '=', Auth::user()->id)->get();

        return View('Cuenta.modificar_cuenta')->with('cuentas', $cuentas)->with('saldo', $cuentas[0]->saldo)->with('accion', $accion);
    }

    public function saldo(Request $request)
    {
        $cuenta = Cuenta::where('user_id', '=', Auth::user()->id)->where('id', '=', $request->input('num_cuenta'))->first();

        echo $cuenta->saldo;
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
        $cuenta = Cuenta::find($request->input("cuenta"));
        $saldo = $request->input("monto");

        if (!is_numeric($saldo)) {
            return array( "error" => true, "msg" => "El saldo debe de ser numerico" );
        }

        if ($saldo <= 0) {
            return array( "error" => true, "msg" => "No puede usar numeros menores que 0" );
        }

        //Depositar
        if ($id == 1)
            $cuenta->saldo += $saldo;
        else // Retitar
            if ($saldo > $cuenta->saldo)
                return array( "error" => true, "msg" => "No puede retirar una cantidad que no posea" );
            else
                $cuenta->saldo -= $saldo;

        if (!$cuenta->save()) {
            return array( "error" => true, "msg" => "No se ha podido realizar la transaccion" );
        }

        return array( "error" => false );;
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
