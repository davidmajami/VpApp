<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userStoreRequest extends FormRequest
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
     */
    public function rules(): array
        {
            return [
                'ime' => 'required|string|max:255',
                'jmbg' => 'required|string|max:13',
                'username' => 'required|string|max:255',
                'uloga' => 'required|in:admin,zaposleni,kupac',
                'password' => 'sometimes|nullable|string|min:6|confirmed',
                'email' => 'nullable|email',
                'adresa' => 'nullable|',
                'prezime' => 'nullable|string|max:255',
                'telefon' => 'nullable|string|max:20',
            ];
        }
}
