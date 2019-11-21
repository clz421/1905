<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public $primarykey='goods_id';

    protected $table = 'goods';
    public $timestamps = false;
    //白名单 不允许为空
    // protected $fillable=['brand_name'];
}
