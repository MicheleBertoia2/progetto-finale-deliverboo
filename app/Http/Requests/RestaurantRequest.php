<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
     * @return array<string, mixed>
     */
//* necessari per public function store(RestaurantRequest $request){
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'image' => 'nullable',
            'address' => 'required|min:2|max:255',
            'vat_number' => 'required|min:8|max:11',
        ];
    }

    //* necessari per public function store(RestaurantRequest $request){
        public function messages(){
        return [
            'name.required' => "È richiesto il campo nome",
            'name.min'      => "Il nome deve contenere almeno :min caratteri",
            'name.max'      => "Il nome non deve superare :max caratteri",

            'address.required' => "Il campo dell'indirizzo è obbligatorio",
            'address.min'      => "Il campo dell'indirizzo deve contenere almeno :min caratteri",
            'address.max'      => "Il campo dell'indirizzo non deve superare :max caratteri",

            'vat_number.required' => "Il campo con il numero della partita IVA è obbligatorio",
            'vat_number.min'      => "Il campo con il numero della partita IVA deve contenere almeno :min caratteri",
            'vat_number.max'      => "Il campo con il numero della partita IVA non deve superare :max caratteri",

        ];

    }
}
