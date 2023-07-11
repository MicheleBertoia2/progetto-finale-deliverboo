<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'text' => 'required|min:10',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve avere minimo min: caratteri',
            'title.max' => 'Il titolo può avere al massimo max: caratteri',
            'text.required' => 'Il testo è un campo obbligatorio',
            'text.min' => 'Il testo deve avere minimo min: caratteri',
        ];
    }
}
