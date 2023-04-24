<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'video',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
