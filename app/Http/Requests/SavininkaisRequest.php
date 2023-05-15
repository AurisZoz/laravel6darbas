<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavininkaisRequest extends FormRequest
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
            'vardas'=>'Vardas yra privalomas ir turi būti nuo 3 iki 32 simbolių ilgio',
            'pavarde'=>'Pavardė yra privaloma ir turi būti nuo 3 iki 32 simbolių ilgio',
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
            'vardas'=>'required|min:3|max:32',
            'pavarde'=>'required|min:3|max:32'
        ];
    }
}
