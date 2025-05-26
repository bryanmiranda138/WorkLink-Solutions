<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion;

class PostulacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fechaPostulacion' => 'required',  
            'oferta_id' => 'required|exists:ofertas,idOferta',
        ]);

        $yaPostulado = Postulacion::where('user_id', auth()->id())
            ->where('oferta_id', $request->oferta_id)
            ->exists();

        if ($yaPostulado) {
            return back()->with('error', 'Ya te has postulado a esta oferta.');
        }

        Postulacion::create([
            'fechaPostulacion' => $request->fechaPostulacion,
            'user_id' => auth()->id(),
            'oferta_id' => $request->oferta_id,
        ]);

        return back()->with('success', 'Te has postulado con éxito.');
    }

}
