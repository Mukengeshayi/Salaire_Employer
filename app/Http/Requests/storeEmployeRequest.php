<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'departement_id'=>'required|integer',
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|unique:employers,email',
            'contact'=>'required|unique:employers,contact',
            'montant_journalier'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'le mail est requis',
            'email.unique'=>'le mail est deja pris',
            'contact.required'=>'le numero de telephone est requis',
            'contact.unique'=>'le numero de telephone est deja pris',
            'montant_journalier.required'=>'Montant joutnalier obligatoire',

        ];
    }
}
