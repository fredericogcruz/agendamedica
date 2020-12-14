<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agendamentos.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coMedicos = DB::table("medicos")->orderBy("medicos.nome", "asc")->get();
        $coPacientes = DB::table("pacientes")->orderBy("pacientes.nome", "asc")->get();
        
        return view('agendamentos.create', compact('coMedicos', 'coPacientes'));
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
            $parametros['dt_agendamento'] = \Carbon\Carbon::parse($parametros['data'].' '.$parametros['hora'])->format('Y-m-d H:i');
            
            \App\Models\Atendimento::create($parametros);
            
            
            DB::commit();
            
            return redirect()->route('agendamentos.index')->with('sucess', 'Agendamento realizado com sucesso!');
        } catch (\PDOException $e) {
            DB::rollBack();
            
            return redirect()->route('agendamentos.create')->with('error', $e->getMessage());
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
     * Consulta ajax por agendamentos.
     *
     * @param Request $request
     */
    public function ajaxConsultarAgendamentos(Request $request)
    {
        $coAtendimentos = DB::table("atendimentos")
                             ->select(['atendimentos.id as id', 
                                       'pacientes.nome as nomePaciente', 
                                       'medicos.nome as nomeMedico', 
                                       'atendimentos.dt_agendamento'])
                            ->Join("medicos", "medicos.id", "atendimentos.medico_id")    
                            ->Join("pacientes", "pacientes.id", "atendimentos.paciente_id")   
                            ->orderBy("atendimentos.dt_agendamento", "desc")
                            ->get();
                        
        foreach ($coAtendimentos as $atendimento){
            $atendimento->dt_agendamento = \Carbon\Carbon::parse($atendimento->dt_agendamento)->format('d/m/Y H:i');
        }          
                        
        return DataTables::of($coAtendimentos)->addColumn('action', function ($coAtendimentos) {
            return '<a href="#top">Alterar</a> <a href="#top">Excluir</a>';
        })->make(true);
    }
}



