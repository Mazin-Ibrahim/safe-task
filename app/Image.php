<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path','imageable_id','imageable_type'];
    public function imageable()
    {
        return $this->morphTo();
    }
}
