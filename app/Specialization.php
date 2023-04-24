<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{

    protected $fillable = ['title'];

    public function users()
    {
        return $this->hasMany(User::class);
    }


}
