<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    protected $fillable = [
        "name",
        'slug',
        "content",
        "risk_factors",
        "early_symptoms",
        "protection",
        "early_detection",
        "image",
        "video",
    ];


    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);

    }//end of get image


    public function getVideoPathAttribute()
    {
        return asset('storage/'.$this->video);

    }//end of get image


}
