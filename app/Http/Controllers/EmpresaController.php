<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ubicacion_Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomEmpresa' => 'required',
            'sector' => 'required',
            'email' => 'required', 
            'telefono' => 'required',
            'ubicacion__empresas.*.nomDepartamento' => 'required',   
            'ubicacion__empresas.*.nomMunicipio' => 'required', 
            'ubicacion__empresas.*.direccion' => 'required'              
        ]);

        $empresa = Empresa::create($request->only([
            'nomEmpresa',
            'sector',
            'email', 
            'telefono'
        ]));

        if ($request->has('ubicacion__empresas')) {
            foreach ($request->input('ubicacion__empresas') as $ubicacion_empresaData) {
                $empresa->ubicacion__empresas()->create($ubicacion_empresaData);
            }
        }

        return redirect()->route('adminDashboardShow');
    }

    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nomEmpresa' => 'required',
            'sector' => 'required',
            'email' => 'required', 
            'telefono' => 'required',
            'ubicacion__empresas.*.nomDepartamento' => 'required',   
            'ubicacion__empresas.*.nomMunicipio' => 'required', 
            'ubicacion__empresas.*.direccion' => 'required'    
        ]);

        $empresa->update($request->only([
            'nomEmpresa',
            'sector',
            'email', 
            'telefono'
        ]));

        $idsEnFormulario = [];

        if ($request->has('ubicacion__empresas')) {
            foreach ($request->input('ubicacion__empresas') as $ubicacion_empresaData) {
                if (isset($ubicacion_empresaData['id'])) {
                    // Actualizar ubicaciones existente
                    $ubicacion_empresa = Ubicacion_Empresa::where('idUbicacionEmpresa', $ubicacion_empresaData['id'])
                                    ->where('empresa_id', $empresa->idEmpresa)
                                    ->first();
    
                    if ($ubicacion_empresa) {
                        $ubicacion_empresa->update([
                            'nomDepartamento' => $ubicacion_empresaData['nomDepartamento'],
                            'nomMunicipio' => $ubicacion_empresaData['nomMunicipio'],
                            'direccion' => $ubicacion_empresaData['direccion']
                        ]);
                        $idsEnFormulario[] = $ubicacion_empresa->idUbicacionEmpresa;
                    }
                } else {
                    // Crear nueva ubicacion
                    $nuevo = $empresa->ubicacion__empresas()->create([
                        'nomDepartamento' => $ubicacion_empresaData['nomDepartamento'],
                        'nomMunicipio' => $ubicacion_empresaData['nomMunicipio'],
                        'direccion' => $ubicacion_empresaData['direccion']
                    ]);
                    $idsEnFormulario[] = $nuevo->idUbicacionEmpresa;
                }
            }
        }

        // Eliminar ubicaciones que ya no están en el formulario
        $empresa->ubicacion__empresas()
            ->whereNotIn('idUbicacionEmpresa', $idsEnFormulario)
            ->delete();          

        return redirect()->route('adminDashboardShow');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('adminDashboardShow');
    }
}
