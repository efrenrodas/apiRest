<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cliente =Cliente::all();
        return response()->json($cliente,200);
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
        //
        $cliente['nombres']=$request['nombres'];
        $cliente['enail']=$request['enail'];
        $cliente['foto']=$request['foto'];
        $cliente['apodo']=$request['apodo'];
       $user = Cliente::create($cliente);

        return response($user,201);
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

        $cliente=Cliente::find($id);
       // return response($cliente,201);
        if ($cliente) {
            $cliente['nombres']=$request['nombres'];
            $cliente['enail']=$request['enail'];
            $cliente['foto']=$request['foto'];
            $cliente['apodo']=$request['apodo'];
            $cliente['pass']=$request['pass'];
            $cliente->save();

            return response()->json($cliente,200);
        }
        else{
            return response()->json(['message'=>'Cliente no encontrado'],404);
        }
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

        if (Cliente::find($id)->delete()) {
            return response()->json(['message'=>'Cliente eliminado'],200);
        }
        else
        {
            return response()->json(['message'=>'Cliente no eliminado'],404);
        }
    }
    public function login(Request $request)
    {
        $cliente = new Cliente;
        $correo=$request['correo'];
        $clave=$request['clave'];
        $cliente=Cliente::where('enail','=',$correo)->where('pass','=',$clave)->first();

        return response()->json($cliente,200);

    }
}
