<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmartphoneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'model' => 'required|string',
            'tss' => 'required|string',
            'average_current' => 'required|string',
            'tv' => 'required|string',
            'radio' => 'required|string',
            'power_of_lock' => 'required|string'
        ];
    }
}
