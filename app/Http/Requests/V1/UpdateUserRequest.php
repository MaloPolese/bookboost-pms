<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        $method = $this->method();
        $isPut = $method === 'PUT';
        $validation = $isPut ? ['required'] : ['sometimes', 'required'];

        return [
            'local' => array_merge($validation, ['string', 'max:255']),
            'firstname' => array_merge($validation, ['string', 'max:255']),
            'lastname' => array_merge($validation, ['string', 'max:255']),
            'email' => array_merge($validation, ['string', 'email', 'max:255', 'unique:users']),
            'phone' => array_merge($validation, ['string', 'max:255']),
        ];
    }
}
