<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'fullname',
        'email_address',
        'phone_number',
        'supervisor_id',
    ];

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}
