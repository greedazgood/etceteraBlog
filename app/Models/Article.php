<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use DefaultDatetimeFormat;

    protected $guarded = [];

    public function scopePublished($builder)
    {
        return $this->where('published',1);
    }
}
