<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resume extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name','headline','summary','email','phone','location', 'linkedin'];

    public function experiences() {
        return $this->hasMany(Experience::class)->orderByDesc('start_date')->orderBy('position');
    }
    public function education() {
        return $this->hasMany(Education::class)->orderByDesc('start_date')->orderBy('position');
    }
}
