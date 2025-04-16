<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use App\Models\Ubicacion_Postulante;
use App\Models\Idioma;
use App\Models\Habilidad;
use App\Models\Educacion;
use App\Models\Experiencia;
use App\Models\Certificacion;
use App\Models\Logro;
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
            'habilidades.*.nivel' => 'required',
            'educaciones.*.titulo' => 'required',
            'educaciones.*.institucion' => 'required',
            'educaciones.*.fechaInicio' => 'required',
            'educaciones.*.fechaFin' => 'required',
            'experiencias.*.puesto' => 'required',
            'experiencias.*.empresa' => 'required',
            'experiencias.*.fechaInicio' => 'required',
            'experiencias.*.fechaFin' => 'required',
            'experiencias.*.contactoEmpresa' => 'nullable',
            'certificaciones.*.nomCert' => 'required',
            'certificaciones.*.institucion' => 'required',
            'certificaciones.*.fechaInicio' => 'required',
            'certificaciones.*.fechaFin' => 'required',
            'logros.*.descLogro' => 'required',
            'logros.*.fechaLogro' => 'required',
            'ubicacion__postulantes.*.nomDepartamento' => 'required',   
            'ubicacion__postulantes.*.nomMunicipio' => 'required', 
            'ubicacion__postulantes.*.direccion' => 'required'     
        ]);

        $postulante = Postulante::create($request->only([
            'primerNombre',
            'segundoNombre',
            'primerApellido',
            'segundoApellido'
        ]));

        if ($request->has('ubicacion__postulantes')) {
            foreach ($request->input('ubicacion__postulantes') as $ubicacion_postulanteData) {
                $postulante->ubicacion__postulantes()->create($ubicacion_postulanteData);
            }
        }

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

        if ($request->has('educaciones')) {
            foreach ($request->input('educaciones') as $educacionData) {
                $postulante->educaciones()->create($educacionData);
            }
        }

        if ($request->has('experiencias')) {
            foreach ($request->input('experiencias') as $experienciaData) {
                $postulante->experiencias()->create($experienciaData);
            }
        }

        if ($request->has('certificaciones')) {
            foreach ($request->input('certificaciones') as $certificacionData) {
                $postulante->certificaciones()->create($certificacionData);
            }
        }

        if ($request->has('logros')) {
            foreach ($request->input('logros') as $logroData) {
                $postulante->logros()->create($logroData);
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
            'habilidades.*.nivel' => 'required',
            'educaciones.*.titulo' => 'required',
            'educaciones.*.institucion' => 'required',
            'educaciones.*.fechaInicio' => 'required',
            'educaciones.*.fechaFin' => 'required',
            'experiencias.*.puesto' => 'required',
            'experiencias.*.empresa' => 'required',
            'experiencias.*.fechaInicio' => 'required',
            'experiencias.*.fechaFin' => 'required',
            'experiencias.*.contactoEmpresa' => 'nullable',
            'certificaciones.*.nomCert' => 'required',
            'certificaciones.*.institucion' => 'required',
            'certificaciones.*.fechaInicio' => 'required',
            'certificaciones.*.fechaFin' => 'required',
            'logros.*.descLogro' => 'required',
            'logros.*.fechaLogro' => 'required',
            'ubicacion__postulantes.*.nomDepartamento' => 'required',   
            'ubicacion__postulantes.*.nomMunicipio' => 'required', 
            'ubicacion__postulantes.*.direccion' => 'required'
        ]);

        $postulante->update($request->only([
            'primerNombre',
            'segundoNombre',
            'primerApellido',
            'segundoApellido',
        ]));

        $idsEnFormulario = [];

        if ($request->has('ubicacion__postulantes')) {
            foreach ($request->input('ubicacion__postulantes') as $ubicacion_postulanteData) {
                if (isset($ubicacion_postulanteData['id'])) {
                    // Actualizar ubicaciones existente
                    $ubicacion_postulante = Ubicacion_Postulante::where('idUbicacionPostulante', $ubicacion_postulanteData['id'])
                                    ->where('postulante_id', $postulante->idPostulante)
                                    ->first();
    
                    if ($ubicacion_postulante) {
                        $ubicacion_postulante->update([
                            'nomDepartamento' => $ubicacion_postulanteData['nomDepartamento'],
                            'nomMunicipio' => $ubicacion_postulanteData['nomMunicipio'],
                            'direccion' => $ubicacion_postulanteData['direccion']
                        ]);
                        $idsEnFormulario[] = $ubicacion_postulante->idUbicacionPostulante;
                    }
                } else {
                    // Crear nueva ubicacion
                    $nuevo = $postulante->ubicacion__postulantes()->create([
                        'nomDepartamento' => $ubicacion_postulanteData['nomDepartamento'],
                        'nomMunicipio' => $ubicacion_postulanteData['nomMunicipio'],
                        'direccion' => $ubicacion_postulanteData['direccion']
                    ]);
                    $idsEnFormulario[] = $nuevo->idUbicacionPostulante;
                }
            }
        }

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
        
        if ($request->has('educaciones')) {
            foreach ($request->input('educaciones') as $educacionData) {
                if (isset($educacionData['id'])) {
                    // Actualizar educacion existente
                    $educacion = Educacion::where('idEducacion', $educacionData['id'])
                                    ->where('postulante_id', $postulante->idPostulante)
                                    ->first();
    
                    if ($educacion) {
                        $educacion->update([
                            'titulo' => $educacionData['titulo'],
                            'institucion' => $educacionData['institucion'],
                            'fechaInicio' => $educacionData['fechaInicio'],
                            'fechaFin' => $educacionData['fechaFin']
                        ]);
                        $idsEnFormulario[] = $educacion->idEducacion;
                    }
                } else {
                    // Crear nueva educacion
                    $nuevo = $postulante->educaciones()->create([
                        'titulo' => $educacionData['titulo'],
                        'institucion' => $educacionData['institucion'],
                        'fechaInicio' => $educacionData['fechaInicio'],
                        'fechaFin' => $educacionData['fechaFin']
                    ]);
                    $idsEnFormulario[] = $nuevo->idEducacion;
                }
            }
        }       
        
        if ($request->has('experiencias')) {
            foreach ($request->input('experiencias') as $experienciaData) {
                if (isset($experienciaData['id'])) {
                    // Actualizar experiencia existente
                    $experiencia = Experiencia::where('idExperiencia', $experienciaData['id'])
                                    ->where('postulante_id', $postulante->idPostulante)
                                    ->first();
    
                    if ($experiencia) {
                        $experiencia->update([
                            'puesto' => $experienciaData['puesto'],
                            'empresa' => $experienciaData['empresa'],
                            'fechaInicio' => $experienciaData['fechaInicio'],
                            'fechaFin' => $experienciaData['fechaFin'],
                            'contactoEmpresa' => $experienciaData['contactoEmpresa']
                        ]);
                        $idsEnFormulario[] = $experiencia->idExperiencia;
                    }
                } else {
                    // Crear nueva experiencia
                    $nuevo = $postulante->experiencias()->create([
                        'puesto' => $experienciaData['puesto'],
                        'empresa' => $experienciaData['empresa'],
                        'fechaInicio' => $experienciaData['fechaInicio'],
                        'fechaFin' => $experienciaData['fechaFin'],
                        'contactoEmpresa' => $experienciaData['contactoEmpresa']
                    ]);
                    $idsEnFormulario[] = $nuevo->idExperiencia;
                }
            }
        } 
        
        if ($request->has('certificaciones')) {
            foreach ($request->input('certificaciones') as $certificacionData) {
                if (isset($certificacionData['id'])) {
                    // Actualizar certificacion existente
                    $certificacion = Certificacion::where('idCertificacion', $certificacionData['id'])
                                    ->where('postulante_id', $postulante->idPostulante)
                                    ->first();
    
                    if ($certificacion) {
                        $certificacion->update([
                            'nomCert' => $certificacionData['nomCert'],
                            'institucion' => $certificacionData['institucion'],
                            'fechaInicio' => $certificacionData['fechaInicio'],
                            'fechaFin' => $certificacionData['fechaFin']
                        ]);
                        $idsEnFormulario[] = $certificacion->idCertificacion;
                    }
                } else {
                    // Crear nueva certificacion
                    $nuevo = $postulante->certificaciones()->create([
                        'nomCert' => $certificacionData['nomCert'],
                        'institucion' => $certificacionData['institucion'],
                        'fechaInicio' => $certificacionData['fechaInicio'],
                        'fechaFin' => $certificacionData['fechaFin']
                    ]);
                    $idsEnFormulario[] = $nuevo->idCertificacion;
                }
            }
        }
        
        if ($request->has('logros')) {
            foreach ($request->input('logros') as $logroData) {
                if (isset($logroData['id'])) {
                    // Actualizar logro existente
                    $logro = Logro::where('idLogro', $logroData['id'])
                                    ->where('postulante_id', $postulante->idPostulante)
                                    ->first();
    
                    if ($logro) {
                        $logro->update([
                            'descLogro' => $logroData['descLogro'],
                            'fechaLogro' => $logroData['fechaLogro']
                        ]);
                        $idsEnFormulario[] = $logro->idLogro;
                    }
                } else {
                    // Crear nuevo logro
                    $nuevo = $postulante->logros()->create([
                        'descLogro' => $logroData['descLogro'],
                        'fechaLogro' => $logroData['fechaLogro']
                    ]);
                    $idsEnFormulario[] = $nuevo->idLogro;
                }
            }
        }        

        // Eliminar ubicaciones que ya no están en el formulario
        $postulante->ubicacion__postulantes()
            ->whereNotIn('idUbicacionPostulante', $idsEnFormulario)
            ->delete();        
        
        // Eliminar idiomas que ya no están en el formulario
        $postulante->idiomas()
            ->whereNotIn('idIdioma', $idsEnFormulario)
            ->delete();

        // Eliminar habilidades que ya no están en el formulario
        $postulante->habilidades()
            ->whereNotIn('idHabilidad', $idsEnFormulario)
            ->delete();  
            
        // Eliminar educaciones que ya no están en el formulario
        $postulante->educaciones()
            ->whereNotIn('idEducacion', $idsEnFormulario)
            ->delete();    
            
        // Eliminar experiencias que ya no están en el formulario
        $postulante->experiencias()
            ->whereNotIn('idExperiencia', $idsEnFormulario)
            ->delete();   
            
        // Eliminar certificaciones que ya no están en el formulario
        $postulante->certificaciones()
            ->whereNotIn('idCertificacion', $idsEnFormulario)
            ->delete();   
            
        // Eliminar logros que ya no están en el formulario
        $postulante->logros()
            ->whereNotIn('idLogro', $idsEnFormulario)
            ->delete();             

        return redirect()->route('postulantes.index');
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();
        return redirect()->route('postulantes.index');
    }
}
