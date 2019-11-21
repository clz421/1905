<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $primarykey='t_id';

    protected $table = 'test';
    public $timestamps = false;
    //白名单 不允许为空
    // protected $fillable=['brand_name'];
}
