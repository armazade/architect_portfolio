<?php

namespace App\Http\Services;

use App\Models\Resume;
use Illuminate\Support\Facades\Storage;

class ResumeService
{
    public static function update(Resume $resume, object $data): Resume
    {
        $resume->title = $data->title;
        $resume->user_id = $data->user_id;
        $resume->is_active = $data->is_active;
        $resume->notify_user = $data->notify_user;

        if (isset($data->file)) {
            if ($resume->file_path) {
                Storage::disk('public')->delete($resume->file_path);
            }
            $path = $data->file->store('resumes', 'public');
            $resume->file_path = $path;
        }

        $resume->save();

        return $resume;
    }
}
