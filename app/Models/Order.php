<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'service_id',
        'amount',
    ];


}
