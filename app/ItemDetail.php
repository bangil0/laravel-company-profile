<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    protected $table    = "item_detail";
	protected $fillable = ["item_id","item_detail_name","item_detail_description","item_detail_image","item_detail_link","item_detail_people"];
	public $timestamps 	= true;

	const IMAGE_PATH 	= "img/item_detail/";

	public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public static function upload($request)
    {
        $file       = $request->file("file");
        $path       = self::IMAGE_PATH;
        $file_name  =  str_random(20).".".$file->getClientOriginalExtension();
        $file->move($path, $file_name);

        return $file_name;
    }

    public function getBodyAttribute()
    {
        return \Parsedown::instance()->text($this->item_detail_description);
    }

    public function getShowLinkAttribute()
    {
        return $this->haveLink();
    }

    public function getShowPeopleAttribute()
    {
        return $this->havePeople();
    }

    public function haveLink()
    {
        return !empty($this->item_detail_link) ? "show_link" : "";
    }

    public function havePeople()
    {
        return !empty($this->item_detail_people) ? "show_people" : "";
    }
}
