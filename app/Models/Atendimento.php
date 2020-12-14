<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atendimento extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paciente_id', 'medico_id', 'anamminese', 'cid', 'peso', 'altura', 'pressao_arterial', 
        'dt_agendamento', 'dt_atendimento', 'created_at', 'updated_at',
    ];
    
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dt_agendamento' => 'datetime',
        'dt_atendimento' => 'datetime',
    ];
    
    
    /**
     * Get the medico associated with the atendimento.
     */
    public function medico()
    {
        return $this->hasOne(Medico::class);
    }
    
    
    /**
     * Get the paciente associated with the atendimento.
     */
    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
}
