<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;
    protected $table = 'postulantes'; 
    protected $primaryKey = 'idPostulante'; 
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['primerNombre', 'segundoNombre', 'primerApellido', 'segundoApellido'];

    public function ubicacion__postulantes()
    {
        return $this->hasMany(Ubicacion_Postulante::class, 'postulante_id', 'idPostulante');
    }

    public function idiomas()
    {
        return $this->hasMany(Idioma::class, 'postulante_id', 'idPostulante');
    }

    public function habilidades()
    {
        return $this->hasMany(Habilidad::class, 'postulante_id', 'idPostulante');
    }

    public function educaciones()
    {
        return $this->hasMany(Educacion::class, 'postulante_id', 'idPostulante');
    }

    public function experiencias()
    {
        return $this->hasMany(Experiencia::class, 'postulante_id', 'idPostulante');
    }

    public function certificaciones()
    {
        return $this->hasMany(Certificacion::class, 'postulante_id', 'idPostulante');
    }

    public function logros()
    {
        return $this->hasMany(Logro::class, 'postulante_id', 'idPostulante');
    }
}
