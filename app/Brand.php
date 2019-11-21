<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $primarykey='brand_id';

    protected $table = 'brand';
    public $timestamps = false;
    //白名单 不允许为空
    // protected $fillable=['brand_name'];
}
