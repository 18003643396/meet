<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
 	protected $table = 'cate';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
