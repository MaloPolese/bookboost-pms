<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'userId' => ['nullable', 'integer', 'exists:users,id'],
            'roomId' => ['nullable', 'integer', 'exists:rooms,id'],
            'source' => array_merge($validation, ['string', 'max:255']),
            'segment' => array_merge($validation, ['string', 'max:255']),
            'start' => array_merge($validation, ['date']),
            'end' => array_merge($validation, ['date']),
            'cancelledAt' => ['nullable', 'date'],
            'createdAtInPms' => ['nullable', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->userId) {
            $this->merge(['user_id' => $this->userId,]);
        }
        if ($this->roomId) {
            $this->merge(['room_id' => $this->roomId]);
        }
        if ($this->cancelledAt) {
            $this->merge(['cancelled_at' => $this->cancelledAt]);
        }
        if ($this->createdAtInPms) {
            $this->merge(['created_at_in_pms' => $this->createdAtInPms]);
        }
    }
}
