<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follow';

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Model\Admin\User','followuser_id');
    }
}
