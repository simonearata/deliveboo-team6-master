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
     * @return array
     */
    public function rules()
    {
        return [
            'restaurant_name' => 'required|max:255|min:2',
            'p_iva' => 'required|string|size:11',
            'address' => 'required|string|max:255',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'type' => 'nullable',
            'category' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'restaurant_name.required' => 'Il nome del ristorante è un campo obbligatorio',
            'restaurant_name.max' => 'Il titolo deve avere un massimo di :max caratteri',
            'restaurant_name.min' => 'Il titolo deve avere un minimo di :min caratteri',
            'p_iva.required' => 'La p. iva è un campo obbligatorio',
            'p_iva.size' => 'La p. iva deve essere di :size caratteri',
            'address.required' => 'L\'indirizzo é un campo obbligatorio ',
            'cover.image' => 'Il file caricato non è un\'immagine',
            'cover.max' => 'Immagine troppo pesante, sono consentiti al massimo :max kb',
        ];
    }
}