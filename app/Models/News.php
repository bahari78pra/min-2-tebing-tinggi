<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['news_app_title'];

    public function getNewsDetailAttribute()
    {
        return Str::words($this->detail, '70');
    }

    public function getNewsAppTitleAttribute()
    {
        return Str::words($this->title, '5');
    }
}
