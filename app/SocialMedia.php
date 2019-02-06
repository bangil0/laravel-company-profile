<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $table    = "sosial_media";
	protected $fillable = ["name","value","icon"];
	public $timestamps 	= true;
}
