<?php

namespace App\Services;

use App\Models\Smartphone;
use Illuminate\Support\Facades\Log;
use Throwable;

class SmartphoneService
{
    public static function store($request)
    {
        try {
            return Smartphone::create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update($request, $smartphone)
    {
        try {
            return $smartphone->update($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy($smartphone)
    {
        try {
            return $smartphone->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function listaSmartphones($request)
    {
        $termoPesquisa = trim($request->searchTerm);

        if (empty($termoPesquisa)) {
            return Smartphone::select('id', 'model as text')->get();
        }

        return Smartphone::select('id', 'model as text')
                    ->where('model', 'like', '%' . $termoPesquisa . '%')
                    ->get();
    }
}