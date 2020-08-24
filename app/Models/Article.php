<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Article extends Model
{
    use DefaultDatetimeFormat;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopePublished($builder)
    {
        return $this->where('published',1);
    }

    public static function getTimeList()
    {
        $timeList[] = Carbon::now()->format('Y-m');
        for ($i = 1; $i <= 12;$i++){
            $timeList[] = Carbon::parse("- {$i}month")->format('Y-m');
        }
        return $timeList;
    }
}
