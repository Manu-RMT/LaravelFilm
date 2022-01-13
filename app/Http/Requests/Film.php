<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Film extends FormRequest
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
            'titre' => ['required', 'string', 'max:200'],
            'annee' => ['required', 'numeric', 'min:1950', 'max:' . date('Y')],
            "description" => ['required','string','max:500']
        ];
    }
}
