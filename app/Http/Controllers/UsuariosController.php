<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parametros = $request->all();
        
        DB::beginTransaction();
        try {
            
            $parametros['password'] = Hash::make($parametros['password']);
            \App\Models\User::create($parametros);
            
            
            DB::commit();
            
            return redirect()->route('usuarios.index')->with('sucess', 'Usuário cadastrado com sucesso!');
        } catch (\PDOException $e) {
            DB::rollBack();
            
            return redirect()->route('usuarios.create')->with('error', $e->getMessage());
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

    
    /**
     * Consulta ajax por usuarios.
     * 
     * @param Request $request
     */
    public function ajaxConsultarUsuarios(Request $request)
    {
        $coUsuarios = DB::table("users")->get();        
        
        return DataTables::of($coUsuarios)->addColumn('action', function ($coUsuarios) {
            return '<a href="#top">Alterar</a> <a href="#top">Excluir</a>';
        })->make(true);
    }
}
