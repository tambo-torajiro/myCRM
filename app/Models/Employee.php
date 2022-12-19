<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tel',
        'employee_status',
        'emergency_name',
        'emergency_contact',
        'emergency_relation',
        'deleted_at',
    ];
}