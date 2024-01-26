<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'job_id',
      'seeker_id',
    ];
    public function job(){
        return $this->belongsTo(Job::class);
    }
    public function seeker(){
        return $this->belongsTo(Seeker::class);
    }
    public function applications(){
        return $this->hasMany(Application::class);
    }
}
