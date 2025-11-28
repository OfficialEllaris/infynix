<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $fullname
 * @property string $email_address
 * @property string|null $phone_number
 * @property int $supervisor_id
 */
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
