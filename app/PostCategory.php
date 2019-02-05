<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table    = "post_category";
	protected $fillable = ["category_name","category_slug"];
	public $timestamps 	= true;

	public static function dropDownCategory()
    {
        return self::orderBy('category_name')->pluck('category_name', 'id');
    }

	public function category()
    {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }
}
