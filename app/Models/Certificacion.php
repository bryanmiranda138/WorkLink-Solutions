<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;

    protected $table = 'certificaciones';
    protected $primaryKey = 'idCertificacion';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nomCert', 'institucion', 'fechaInicio', 'fechaFin', 'postulante_id'];

    /**
     * Relación muchos a uno con Postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id', 'idPostulante');
    }
}
