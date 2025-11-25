<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = [
        'fullname',
        'email_address',
        'phone_number',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
