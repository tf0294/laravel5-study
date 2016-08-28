<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // updated_at create_atを無効化
    public $timestamps = false;
}
