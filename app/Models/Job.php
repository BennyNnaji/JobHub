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
        'category',
        'job_description',
        'min_salary',
        'max_salary',
        'job_location',
        'deadline',
        'responsibility',
        'benefits',
        'job_status',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function applicants(){
        return $this->hasMany(Application::class);
    }
    public function saved_jobs(){
        return $this->hasMany(SavedJob::class);
    }
    public function reported_jobs(){
        return $this->hasMany(ReportJob::class);
    }
}
