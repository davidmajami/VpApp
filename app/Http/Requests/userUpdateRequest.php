<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ili dodaj logiku za autorizaciju ako treba
    }

    public function rules(): array
        {
            return [
                'ime' => 'required|string|max:255',
                'jmbg' => 'required|string|max:13',
                'username' => 'required|string|max:255',
                'uloga' => 'required|in:admin,zaposleni,kupac',
                'password' => 'sometimes|nullable|string|min:6|confirmed',
                'email' => 'nullable|email',
                'adresa' => 'nullable',
                'prezime' => 'nullable|string|max:255',
                'telefon' => 'nullable|string|max:20',
            ];
        }
    public function validationData()
        {
            return $this->all();
        }

}
