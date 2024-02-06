<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Video extends Model
{
    protected $guarded=['id'];

    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make("https://www.youtube.com/watch?v=".$this->video_url)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => '100%', 'height' => '400']);
        return $embed->getHtml();
    }
}
