<?php

namespace App\Http\Requests;

use App\Gates\UserGate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResumeStoreRequest extends FormRequest
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
            'file' => ['required', 'file', 'max:20000', 'mimes:pdf,doc,docx'],
        ];
    }
}
