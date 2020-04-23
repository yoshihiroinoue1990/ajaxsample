<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'area_name' => 'required'
    );
}
