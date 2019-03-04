<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table    = "item";
	protected $fillable = ["item_name","item_description"];
	public $timestamps 	= true;

	public function itemdetail()
    {
        return $this->hasMany(ItemDetail::class);
    }

    public function getBodyAttribute()
    {
        return substr(strip_tags($this->item_description), 0, 100);
    }
}
