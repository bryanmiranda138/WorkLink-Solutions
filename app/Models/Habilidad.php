<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    use HasFactory;

    protected $table = 'habilidades';
    protected $primaryKey = 'idHabilidad';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['habilidad', 'nivel', 'postulante_id'];

    /**
     * Relación muchos a uno con Postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id', 'idPostulante');
    }
}
