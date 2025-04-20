<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion_Empresa extends Model
{
    use HasFactory;

    protected $table = 'ubicacion__empresas';
    protected $primaryKey = 'idUbicacionEmpresa';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nomDepartamento', 'nomMunicipio', 'direccion', 'empresa_id'];

    /**
     * Relación muchos a uno con Empresa
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'idEmpresa');
    }
}
