<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::all();
        return view('postulantes.index', compact('postulantes'));
    }

    public function create()
    {
        return view('postulantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'primerNombre' => 'required',
            'segundoNombre' => 'nullable',
            'primerApellido' => 'required',
            'segundoApellido' => 'nullable'
        ]);

        Postulante::create($request->all());
        return redirect()->route('postulantes.index');
    }

    public function edit(Postulante $postulante)
    {
        return view('postulantes.edit', compact('postulante'));
    }

    public function update(Request $request, Postulante $postulante)
    {
        $request->validate([
            'primerNombre' => 'required',
            'segundoNombre' => 'nullable',
            'primerApellido' => 'required',
            'segundoApellido' => 'nullable'
        ]);

        $postulante->update($request->all());
        return redirect()->route('postulantes.index');
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();
        return redirect()->route('postulantes.index');
    }
}
