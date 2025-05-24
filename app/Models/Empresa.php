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
    protected $fillable = ['nomEmpresa', 'sector', 'email', 'telefono', 'user_id'];

    public function ubicacion__empresas()
    {
        return $this->hasMany(Ubicacion_Empresa::class, 'empresa_id', 'idEmpresa');
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'oferta_id', 'idOferta');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
