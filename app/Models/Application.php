<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'seeker_id',
        'job_id',
        'status',
        'cover_letter_upload',
        'cover_letter_type',
        'resume'
    ];
    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function saved_job(){
        return $this->belongsTo(SavedJob::class);
    }
}
