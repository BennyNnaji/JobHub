<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'job_title',
        'job_type',
        'job_description',
        'min_salary',
        'max_salary',
        'job_location',
        'deadline',
        'responsibility',
        'benefits',
        'job_status'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
