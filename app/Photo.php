<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/images/';
    protected $fillable = ['image_path'];

    public function getImagePathAttribute($photo) {
        return $this->uploads . $photo;
    }
    
}
