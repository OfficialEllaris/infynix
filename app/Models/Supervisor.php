<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $fullname
 * @property string $email_address
 * @property string|null $phone_number
 */
class Supervisor extends Model
{
    protected $fillable = [
        'fullname',
        'email_address',
        'phone_number',
        'resume',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
