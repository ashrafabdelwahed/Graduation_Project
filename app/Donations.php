<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    protected $fillable = ['donor','email','phone','amount'];
}
