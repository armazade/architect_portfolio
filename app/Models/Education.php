<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = ['resume_id','school','degree','field','start_date','end_date','description','position'];
    protected $casts = ['start_date'=>'date','end_date'=>'date'];

    public function resume() { return $this->belongsTo(Resume::class); }
}

