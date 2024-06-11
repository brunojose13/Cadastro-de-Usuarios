<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'cpf',
        'phone_number',
        'age'
    ];

    protected $hidden = [
        'cpf',
        'age',
        'created_at'
    ];
}
