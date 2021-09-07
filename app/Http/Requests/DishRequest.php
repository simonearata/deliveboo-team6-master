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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100|min:2',
            'ingredients' => 'required|string|max:255',
            'price' => 'required|numeric ',
            'visible' => 'required|boolean',
            'cover' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il nome del piatto è un campo obbligatorio',
            'name.max' => 'Il titolo deve avere un massimo di :max caratteri',
            'name.min' => 'Il titolo deve avere un massimo di :min caratteri',
            'ingredients.required' => 'Inserisci gli ingredienti',
            'price.required' => 'Inserisci il prezzo',
            'visible.required' => 'Inserisci se il piatto è disponibile',
            'cover.image' => 'Il file caricato non è un\'immagine',
            'cover.max' => 'Immagine troppo pesante, sono consentiti al massimo :max kb',
        ];
    }
}
