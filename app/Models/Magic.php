<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magic extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address_street1',
        'address_street2',
        'address_city',
        'address_state',
        'address_zip',
        'phone',
        'payment_credit_card_number',
        'payment_credit_card_expiration',
        'quantity',
        'total',
        'order_date',
        'fulfilled',
    ];
}
