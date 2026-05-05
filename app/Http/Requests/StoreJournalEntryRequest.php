<?php

namespace App\Http\Requests;

use App\Models\JournalEntry;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJournalEntryRequest extends FormRequest
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
            'entry_date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
            'event_type' => ['required', 'string', Rule::in(JournalEntry::TYPES)],
            'event_text' => ['required', 'string'],
            'staff_id' => ['nullable', 'integer', 'exists:staff,id'],
            'staff_name' => ['required', 'string', 'max:255'],
            'shift_from_staff_id' => ['nullable', 'integer', 'exists:staff,id'],
            'shift_to_staff_id' => ['nullable', 'integer', 'exists:staff,id'],
            'inspection_readings' => ['nullable', 'array'],
            'occurred_at' => ['nullable', 'date'],
        ];
    }
}
