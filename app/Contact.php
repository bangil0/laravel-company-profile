<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table    = "contact";
	protected $fillable = ["contact_name","contact_email","contact_subject","contact_message"];
	public $timestamps 	= true;
}
