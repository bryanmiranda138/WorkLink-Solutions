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
}
