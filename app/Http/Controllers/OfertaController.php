<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Empresa;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::where('user_id', auth()->id())->first();

        $ofertas = $empresa 
            ? Oferta::where('empresa_id', $empresa->idEmpresa)->get()
            : collect();

        return view('ofertas.index', compact('ofertas'));
    }

    public function show($id)
    {
        $oferta = Oferta::where('idOferta', $id)->firstOrFail();
        return view('ofertas.show', compact('oferta'));
    }

    public function create()
    {
        return view('ofertas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tituloOferta' => 'required',
            'descOferta' => 'required',
            'requisitos' => 'required', 
            'salario' => 'required',
            'modalidad' => 'required', 
            'ubicacion' => 'nullable', 
            'fechaPublicacion' => 'required',
            'empresa_id' => 'required'             
        ]);

        $oferta = Oferta::create($request->only([
            'tituloOferta',
            'descOferta',
            'requisitos', 
            'salario',
            'modalidad',
            'ubicacion',
            'fechaPublicacion',
            'empresa_id'
        ]));

        return redirect()->route('adminDashboardShow');
    }

    public function edit(Oferta $oferta)
    {
        return view('ofertas.edit', compact('oferta'));
    }

    public function update(Request $request, Oferta $oferta)
    {
        $request->validate([
            'tituloOferta' => 'required',
            'descOferta' => 'required',
            'requisitos' => 'required', 
            'salario' => 'required',
            'modalidad' => 'required', 
            'ubicacion' => 'nullable', 
            'fechaPublicacion' => 'required',
            'empresa_id' => 'required'     
        ]);

        $oferta->update($request->only([
            'tituloOferta',
            'descOferta',
            'requisitos', 
            'salario',
            'modalidad',
            'ubicacion',
            'fechaPublicacion',
            'empresa_id'
        ]));       

        return redirect()->route('adminDashboardShow');
    }

    public function destroy(Oferta $oferta)
    {
        $oferta->delete();
        return redirect()->route('adminDashboardShow');
    }

}
