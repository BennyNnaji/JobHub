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
    protected $casts = [
        'career' => 'array',
    ];
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