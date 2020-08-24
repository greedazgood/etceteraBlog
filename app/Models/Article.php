<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

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
        $during = 3600 * 24 * 7;
        $timeList = Cache::remember('time-list',$during,function (){
            return Article::query()->Published()->select(\DB::raw('date_format(updated_at,"%Y-%m") as month'))->distinct()->orderByDesc('month')->pluck('month');
        });
        return $timeList;
    }
}
