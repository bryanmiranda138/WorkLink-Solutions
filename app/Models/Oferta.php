<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'ofertas'; 
    protected $primaryKey = 'idOferta'; 
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['tituloOferta', 'descOferta', 'requisitos', 'salario', 'modalidad', 
        'ubicacion', 'fechaPublicacion', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'idEmpresa');
    }
}
