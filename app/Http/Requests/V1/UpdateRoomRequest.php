<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'number' => array_merge($validation, ['string', 'max:255']),
            'floor' => array_merge($validation, ['string', 'max:255']),
        ];
    }
}
