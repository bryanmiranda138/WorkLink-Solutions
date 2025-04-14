<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    protected $table = 'experiencias';
    protected $primaryKey = 'idExperiencia';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['puesto', 'empresa', 'fechaInicio', 'fechaFin', 'contactoEmpresa', 'postulante_id'];

    /**
     * Relación muchos a uno con Postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id', 'idPostulante');
    }        
}
