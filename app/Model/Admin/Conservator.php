<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Conservator extends Model
{
    protected $table = 'conservator';

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
