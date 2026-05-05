<?php

namespace App\Http\Requests;

use App\Models\Vacation;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVacationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'staff_id' => ['sometimes', 'required', 'integer', 'exists:staff,id'],
            'type' => ['sometimes', 'required', 'string', Rule::in(Vacation::TYPES)],
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => ['sometimes', 'required', 'date', 'after_or_equal:start_date'],
            'comment' => ['nullable', 'string', 'max:255'],
        ];
    }
}
