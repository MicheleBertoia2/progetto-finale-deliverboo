<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'image_path' => 'required|max:255',
            'price' => 'required',
            'ingredients' => 'required',
            'vote' => 'required|max:5',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Il nome è un campo obbligatorio',
            'name.max' => 'Il nome non può avere piu di :max',
            'image_path.required' => 'il percorso della immagine  è un campo obbligatorio',
            'image_path.max' => 'Il percorso della immagine non può avere piu di :max caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'ingredients.required' => 'Ingredienti è un campo obbligatorio',
            'vote.required' => 'il voto è un campo obbligatorio',
            'vote.max' => 'Il voto non può avere piu di :max come valore',
        ];
    }
}
