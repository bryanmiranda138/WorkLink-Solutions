<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    use HasFactory;

    protected $table = 'logros';
    protected $primaryKey = 'idLogro';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['descLogro', 'fechaLogro', 'postulante_id'];

    /**
     * Relación muchos a uno con Postulante
     */
    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id', 'idPostulante');
    }
}
