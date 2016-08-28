<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // updated_at create_atを無効化
    public $timestamps = false;
}
