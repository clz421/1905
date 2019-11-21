<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $primarykey='admin_id';

    protected $table = 'admin';
    public $timestamps = false;
    //白名单 不允许为空
    // protected $fillable=['brand_name'];
}
