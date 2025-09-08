<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['resume_id','company','role','start_date','end_date','is_current','location','description','position'];
    protected $casts = ['start_date'=>'date','end_date'=>'date','is_current'=>'bool'];

    public function resume() { return $this->belongsTo(Resume::class); }
}
