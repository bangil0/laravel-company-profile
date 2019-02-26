<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $table    = "page";
	protected $fillable = ["page_name","page_slug","page_description"];
	public $timestamps 	= true;

	public function getBodyAttribute()
    {
        return \Parsedown::instance()->text($this->page_description);
    }
}
