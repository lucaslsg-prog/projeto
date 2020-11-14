<?php

namespace App\Http\Controllers\Restrito;

use App\DataTables\SmartphoneDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SmartphoneRequest;
use App\Models\Smartphone;
use App\Services\SmartphoneService;
use Illuminate\Http\Request;

class SmartphoneController extends Controller
{
    public function index(SmartphoneDataTable $smartphoneDataTable)
    {
        return $smartphoneDataTable->render('restrito.smartphones.index');
    }

    public function create()
    {
        return view('restrito.smartphones.form');
    }

    public function store(SmartphoneRequest $request)
    {
        $smartphone = SmartphoneService::store($request->all());

        if ($smartphone) {
            return redirect()->route('restrito.smartphones.index')
                        ->withSucesso('Salvo com sucesso');
        }

        return back()->withInput()
                    ->withFalha('Erro ao salvar');
    }

    public function edit(Smartphone $smartphone)
    {
        return view('restrito.smartphones.form', compact('smartphone'));
    }

    public function update(SmartphoneRequest $request, Smartphone $smartphone)
    {
        $smartphone = SmartphoneService::update($request->all(), $smartphone);

        if ($smartphone) {
            return redirect()->route('restrito.smartphones.index')
                        ->withSucesso('Atualizado com sucesso');
        }

        return back()->withInput()
                    ->withFalha('Erro ao atualizar');
    }

    public function destroy(Smartphone $smartphone)
    {
        $deleteSmartphone = SmartphoneService::destroy($smartphone);

        if ($deleteSmartphone) {
            return response('Apagado com sucesso', 200);
        }

        return response('Erro ao apagar', 400);
    }

    public function listaSmartphones(Request $request)
    {
        return SmartphoneService::listaSmartphones($request);
    }
}
