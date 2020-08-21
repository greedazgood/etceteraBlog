<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function scopePublished($builder)
    {
        return $this->where('published',1);
    }
}
