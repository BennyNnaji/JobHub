<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'seeker_id',
        'reason',
        'detail',
    ];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }
}
