<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_number',
        'phone_number',
        'polling_station',
        'role',
    ];
    public function admittedBy()
    {
        return $this->belongsTo(User::class, 'admitted_by');
    }
}
