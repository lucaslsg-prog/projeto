<?php

namespace App\Http\Controllers\Restrito;

use App\DataTables\TabletDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tablet;
use App\Services\TabletService;
use Illuminate\Http\Request;

class TabletController extends Controller
{
    public function index(TabletDataTable $tabletDataTable)
    {
        return $tabletDataTable->render('restrito.tablets.index');
    }

    public function create()
    {
        return view('restrito.tablets.form');
    }

    public function store(Request $request)
    {
        $tablet = TabletService::store($request->all());

        if ($tablet) {
            return redirect()->route('restrito.tablets.index')
                        ->withSucesso('Salvo com sucesso');
        }

        return back()->withInput()
                    ->withFalha('Erro ao salvar');
    }

    public function edit(Tablet $tablet)
    {
        return view('restrito.tablets.form', compact('tablet'));
    }

    public function update(Request $request, Tablet $tablet)
    {
        $tablet = TabletService::update($request->all(), $tablet);

        if ($tablet) {
            return redirect()->route('restrito.tablets.index')
                        ->withSucesso('Atualizado com sucesso');
        }

        return back()->withInput()
                    ->withFalha('Erro ao atualizar');
    }

    public function destroy(Tablet $tablet)
    {
        $deleteTablet = TabletService::destroy($tablet);

        if ($deleteTablet) {
            return response('Apagado com sucesso', 200);
        }

        return response('Erro ao apagar', 400);
    }
    public function listaTablets(Request $request)
    {
        return TabletService::listaTablets($request);
    }
}
