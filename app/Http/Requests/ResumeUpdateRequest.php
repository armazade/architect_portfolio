<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'exists:users,id'],
            'is_active' => ['required', 'boolean'],
            'notify_user' => ['required', 'boolean'],
            'file' => ['nullable', 'file', 'max:20000', 'mimes:pdf,doc,docx'],
        ];
    }
}
