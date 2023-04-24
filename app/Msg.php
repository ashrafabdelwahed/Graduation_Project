<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    protected $fillable = ['image'];


    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);

    }//end of get image


}
