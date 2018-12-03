<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
