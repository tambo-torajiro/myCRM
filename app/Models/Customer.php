<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'work_category',
        'tel',
        'email',
        'postcode',
        'address',
        'person_in_charge1',
        'person_in_charge2',
        'person_in_charge3',
        'request_date',
        'memo',
    ];

    public function scopeSearchCustomers($query, $input = null)
    {
        if (!empty($input))
        {
            if (Customer::where('name', 'like', $input . '%')
                ->orWhere('tel', 'like', $input . '%')
                ->exists()
            )
            {
                return $query->where('name', 'like', $input . '%')
                    ->orWhere('tel', 'like', $input . '%');
            };
        };
    }
}