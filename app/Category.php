<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','parent_id'];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }



    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
