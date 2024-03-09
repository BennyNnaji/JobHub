<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySeeker extends Model
{
    use HasFactory;
    protected $table = 'companies_seekers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'user_type',
    ];

    public function user()
    {
        if ($this->user_type === 'seeker') {
            return $this->belongsTo(Seeker::class, 'user_id');
        } elseif ($this->user_type === 'company') {
            return $this->belongsTo(Company::class, 'user_id');
        }

        return null;
    }
}
