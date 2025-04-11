<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    use HasFactory;

    protected $table = 'educaciones';
    protected $primaryKey = 'idEducacion';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['titulo', 'institucion', 'fechaInicio', 'fechaFin', 'postulante_id'];

    /**
     * Relación muchos a uno con Postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id', 'idPostulante');
    }
}
