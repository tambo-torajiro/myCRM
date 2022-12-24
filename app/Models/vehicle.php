<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;

        protected $fillable = [
        'type',
        'car_number',
        'body_type',
        'registration_date',
        'inspection_date',
        'start_milage',
        'deleted_at',
    ];
}