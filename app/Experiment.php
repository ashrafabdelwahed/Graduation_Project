<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{

    protected $table = 'experiments';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'video',
        'user_id',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);

    }//end of get image


    public function getVideoPathAttribute()
    {
        return asset('storage/'.$this->video);

    }//end of get image

}
