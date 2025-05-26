<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $fillable = ['fechaPostulacion', 'user_id', 'oferta_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function oferta() {
        return $this->belongsTo(Oferta::class);
    }
    
}
