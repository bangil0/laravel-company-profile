<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table    = "post_category";
	protected $fillable = ["category_name","category_slug"];
	public $timestamps 	= true;
}
