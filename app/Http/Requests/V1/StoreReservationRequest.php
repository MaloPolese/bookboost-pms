<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReservationRequest extends FormRequest
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
        return [
            'userId' => ['nullable', 'integer', 'exists:users,id'],
            'roomId' => ['nullable', 'integer', 'exists:rooms,id'],
            'source' => ['required', 'string', 'max:255', Rule::in('Enquired', 'Requested', 'Optional', 'Confirmed', 'Started', 'Processed', 'Canceled')],
            'segment' => ['required', 'string', 'max:255'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'cancelledAt' => ['nullable', 'date'],
            'createdAtInPms' => ['nullable', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'room_id' => $this->roomId,
            'cancelled_at' => $this->cancelledAt,
            'created_at_in_pms' => $this->createdAtInPms,
        ]);
    }
}
