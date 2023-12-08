<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'website',
        'phone',
        'password',
        'logo',
        'banner',
        'description',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'status',
        'social_media',
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