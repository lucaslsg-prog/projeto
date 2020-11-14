<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TabletRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'model' => 'required|string',
            'average_current' => 'required|string',
            'tv' => 'required|string',
            'radio' => 'required|string',
            'power_of_lock' => 'required|string'
        ];
    }
}
