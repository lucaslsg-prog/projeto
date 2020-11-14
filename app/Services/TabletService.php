<?php

namespace App\Services;

use App\Models\Tablet;
use Illuminate\Support\Facades\Log;
use Throwable;

class TabletService
{
    public static function store($request)
    {
        try {
            $tablet = Tablet::create($request);
            //$livro->autors()->sync($request['autor']);
            return $tablet;
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update($request, $tablet)
    {
        try {
            return $tablet->update($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy($tablet)
    {
        try {
            return $tablet->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function listaTablets($request)
    {
        $termoPesquisa = trim($request->searchTerm);

        if (empty($termoPesquisa)) {
            return Tablet::select('id', 'model as text')->get();
        }

        return Tablet::select('id', 'model as text')
                    ->where('model', 'like', '%' . $termoPesquisa . '%')
                    ->get();
    }
}