<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
