<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name','phone','email','line1','line2','city','state','country','postal_code'
    ];
}
