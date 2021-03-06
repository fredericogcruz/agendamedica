<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pacientes.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
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
            
            \App\Models\Paciente::create($parametros);
            
            
            DB::commit();
            
            return redirect()->route('pacientes.index')->with('sucess', 'Paciente cadastrado com sucesso!');
        } catch (\PDOException $e) {
            DB::rollBack();
            
            return redirect()->route('pacientes.create')->with('error', $e->getMessage());
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
     * Consulta ajax por pacientes.
     *
     * @param Request $request
     */
    public function ajaxConsultarPacientes(Request $request)
    {
        $coPacientes = DB::table("pacientes")
                        ->select(['id', 'nome', 'sexo', 'rg', 'idade', 'created_at', 'updated_at'])
                        ->orderByDesc('created_at')
                        ->get();

        foreach ($coPacientes as $paciente){
            $paciente->sexo = ($paciente->sexo=='M') ? 'Masculino' : 'Feminino';
        }
                        
        
        return DataTables::of($coPacientes)->addColumn('action', function ($coPacientes) {
            return '<a href="#top">Alterar</a> <a href="#top">Excluir</a>';
        })->make(true);
    }
}
