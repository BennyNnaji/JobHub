<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = [

        'email',
        'phone',
        'password',
        'address',
        'country',
        'state',
        'city',
        'gender',
        'birthday',
        'summary',
        'education',
        'career',
        'name',
        'skill',
        'license',
        'language',

    ];
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function saved_jobs()
    {
        return $this->hasMany(SavedJob::class);
    }
    public function reported_jobs()
    {
        return $this->hasMany(ReportJob::class);
    }
    // Message lol
    public function companySeeker()
    {
        return $this->hasOne(CompanySeeker::class, 'user_id')->where('user_type', 'seeker');
    }

    public function company()
    {
        return $this->hasOneThrough(Company::class, CompanySeeker::class, 'user_id', 'id', 'id', 'user_id')->where('companies_seekers.user_type', 'company');
    }
    // Ends here... God abeg lol

    // protected $casts = [
    //     'career' => 'array',
    // ];
    public function getAuthIdentifierName()
    {
        return 'id'; // Change this if your primary key column name is different
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
