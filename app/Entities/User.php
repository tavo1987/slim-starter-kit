<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

	public $timestamps = false;

    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    public function setPassword($password)
    {
        $this->update([
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}
