<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Conservator extends Model
{
    protected $table = 'conservator';

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role','conservatorrole');
    }
}
