<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    protected $guarded = ['id'];

    public function getProfileDetailAttribute()
    {
        return Str::words($this->detail, '30');
    }
}
