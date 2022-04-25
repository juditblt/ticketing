<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTicketRequest extends FormRequest
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
        /*
        return [
            'name' => 'string|nullable',
            'email' => 'required|email:rfc',
            'priority' => 'numeric|between:1,5',
            'department' => ['required', Rule::in(['it', 'cleaning', 'maintenance'])],
            'text' => 'required'
        ];
        */
        return [
            'category_id' => 'required|integer|min:0',
            'priority' => 'required|integer|min:1|max:5',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        /*
        return [
            'required' => 'A(z) :attribute mező megadása kötelező!',
            'email.required' => 'Az E-mail cím megadása kötelező!',
            'email.email' => 'Az E-mail cím nincs megfelelő formátumban!',
            'priority.numeric' => 'A Prioritás értékének számnak kell lennie!',
            'priority.between' => 'A Prioritás értékének (:input) :min és :max között kell lennie!',
            'department.required' => 'A Részleg megadása kötelező!',
            'department.in' => 'A részleg értékének a következők egyikének kell lennie (:values)!',
            'text.required' => 'A Szöveg megadása kötelező!'
        ];
        */
        return [
            'required' => 'A(z) :attribute mező megadása kötelező!',
            'integer' => 'A(z) :attribute mező értéke egész szám kell legyen!',
            'min' => 'A(z) :attribute mező értéke (:input) nagyobb kell legyen, mint :min',
            'category_id.min' => 'A kategória azonosító nullánál nagyobb kell legyen!',
        ];
    }

    public function attributes()
    {
        /*
        return [
            'name' => 'Név',
            'email' => 'E-mail cím',
            'priority' => 'Prioritás',
            'department' => 'Részleg',
            'text' => 'Szöveg'
        ];
        */
        return [
            'category_id' => 'Kategória',
            'priority' => 'Prioritás',
            'description' => 'Hiba leírás'
        ];
    }
}
