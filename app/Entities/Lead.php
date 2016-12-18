<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;

class Lead extends Model
{

    protected $table = 'leads';

    public $timestamps = false;

    public function getFullNameAttribute($value)
    {
        return $this->attributes['name'];
    }

    public function isRegistered($email)
    {
        return $this->where('email', '=', $email)->first();
    }

}
