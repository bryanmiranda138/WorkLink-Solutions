<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion_Postulante extends Model
{
    use HasFactory;

    protected $table = 'ubicacion__postulantes';
    protected $primaryKey = 'idUbicacionPostulante';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nomDepartamento', 'nomMunicipio', 'direccion', 'postulante_id'];

    /**
     * Relación muchos a uno con Postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id', 'idPostulante');
    }
}
