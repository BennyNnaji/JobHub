<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'job_id',
        'subject',
        'message',
        'parent_message_id',
    ];
    public function sender()
    {
        return $this->belongsTo(CompanySeeker::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(CompanySeeker::class, 'receiver_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
