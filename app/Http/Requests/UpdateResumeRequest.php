<?php

namespace App\Http\Requests;

use App\Gates\UserGate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateResumeRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Adjust as needed (true to allow)
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'headline'  => ['nullable', 'string', 'max:255'],
            'summary'   => ['nullable', 'string'],
            'email'     => ['nullable', 'email', 'max:255'],
            'phone'     => ['nullable', 'string', 'max:255'],
            'location'  => ['nullable', 'string', 'max:255'],
            'linkedin'  => ['nullable', 'string', 'max:255'],
        ];
    }
}
