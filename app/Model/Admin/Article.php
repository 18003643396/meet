<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $table = 'article';

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    public function user()
	{
		return $this -> belongsTo(User::class,'user_id','id')->select(['id', 'name', 'img']);	
	}
}
