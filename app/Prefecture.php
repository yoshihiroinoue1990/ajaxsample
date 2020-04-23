<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'prefecture_name' => 'required',
        'area_id' => 'required',
    );
}
