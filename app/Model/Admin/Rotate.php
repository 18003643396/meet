<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Rotate extends Model
{
    protected $table = 'rotate';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
