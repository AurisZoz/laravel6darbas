<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomobiliaiRequest extends FormRequest
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

    public function messages()
    {
       return  [
        'id.required'=>'ID yra privalomas',
        'id.integer'=>'ID turi būti sveikasis skaičius',
        'numeris'=>'Automobilio numerį turi sudaryti 3 didžiosios raidės ir 3 skaičiai, be tarpo',
        'marke'=>'Markė yra privaloma',
        'modelis'=>'Modelis yra privalomas',
        ];

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>'required|integer',     
            'numeris'=>'required|regex:/^[A-Z]{3}\d{3}$/',
            'marke'=>'required',
            'modelis'=>'required',
        ];
    }
}
