<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name' ,
        'price' ,
        'description' ,
        'company_id',
    ];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }



    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
