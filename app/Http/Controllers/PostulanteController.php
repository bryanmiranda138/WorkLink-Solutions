<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\Idioma;
use App\Models\Habilidad;
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
            'segundoApellido' => 'nullable',
            'idiomas.*.idioma' => 'required',
            'idiomas.*.nivel' => 'required',
            'habilidades.*.habilidad' => 'required',
            'habilidades.*.nivel' => 'required'
        ]);

        $postulante = Postulante::create($request->only([
            'primerNombre',
            'segundoNombre',
            'primerApellido',
            'segundoApellido'
        ]));

        if ($request->has('idiomas')) {
            foreach ($request->input('idiomas') as $idiomaData) {
                $postulante->idiomas()->create($idiomaData);
            }
        }

        if ($request->has('habilidades')) {
            foreach ($request->input('habilidades') as $habilidadData) {
                $postulante->habilidades()->create($habilidadData);
            }
        }

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
            'segundoApellido' => 'nullable',
            'idiomas.*.idioma' => 'required',
            'idiomas.*.nivel' => 'required',
            'habilidades.*.habilidad' => 'required',
            'habilidades.*.nivel' => 'required'
        ]);

        $postulante->update($request->only([
            'primerNombre',
            'segundoNombre',
            'primerApellido',
            'segundoApellido',
        ]));

        $idsEnFormulario = [];

        if ($request->has('idiomas')) {
            foreach ($request->input('idiomas') as $idiomaData) {
                if (isset($idiomaData['id'])) {
                    // Actualizar idioma existente
                    $idioma = Idioma::where('idIdioma', $idiomaData['id'])
                                    ->where('postulante_id', $postulante->idPostulante)
                                    ->first();
    
                    if ($idioma) {
                        $idioma->update([
                            'idioma' => $idiomaData['idioma'],
                            'nivel' => $idiomaData['nivel'],
                        ]);
                        $idsEnFormulario[] = $idioma->idIdioma;
                    }
                } else {
                    // Crear nuevo idioma
                    $nuevo = $postulante->idiomas()->create([
                        'idioma' => $idiomaData['idioma'],
                        'nivel' => $idiomaData['nivel'],
                    ]);
                    $idsEnFormulario[] = $nuevo->idIdioma;
                }
            }
        }

        if ($request->has('habilidades')) {
            foreach ($request->input('habilidades') as $habilidadData) {
                if (isset($habilidadData['id'])) {
                    // Actualizar habilidad existente
                    $habilidad = Habilidad::where('idHabilidad', $habilidadData['id'])
                                    ->where('postulante_id', $postulante->idPostulante)
                                    ->first();
    
                    if ($habilidad) {
                        $habilidad->update([
                            'habilidad' => $habilidadData['habilidad'],
                            'nivel' => $habilidadData['nivel'],
                        ]);
                        $idsEnFormulario[] = $habilidad->idHabilidad;
                    }
                } else {
                    // Crear nueva habilidad
                    $nuevo = $postulante->habilidades()->create([
                        'habilidad' => $habilidadData['habilidad'],
                        'nivel' => $habilidadData['nivel'],
                    ]);
                    $idsEnFormulario[] = $nuevo->idHabilidad;
                }
            }
        }        
    
        // Eliminar idiomas que ya no están en el formulario
        $postulante->idiomas()
            ->whereNotIn('idIdioma', $idsEnFormulario)
            ->delete();

        // Eliminar habilidades que ya no están en el formulario
        $postulante->habilidades()
            ->whereNotIn('idHabilidad', $idsEnFormulario)
            ->delete();            

        return redirect()->route('postulantes.index');
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();
        return redirect()->route('postulantes.index');
    }
}
