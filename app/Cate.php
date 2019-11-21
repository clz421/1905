<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $primarykey='cate_id';

    protected $table = 'cate';
    public $timestamps = false;
    //白名单 不允许为空
    // protected $fillable=['brand_name'];
}
