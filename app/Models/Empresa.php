<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas'; 
    protected $primaryKey = 'idEmpresa'; 
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nomEmpresa', 'sector', 'email', 'telefono'];

    public function ubicacion__empresas()
    {
        return $this->hasMany(Ubicacion_Empresa::class, 'empresa_id', 'idEmpresa');
    }
}
