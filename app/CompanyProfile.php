<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
	protected $table    = "profile";
	protected $fillable = ["company_name","company_phone","company_address","company_email","company_logo"];
	public $timestamps 	= true;
    
	const IMAGE_PATH 	= "img/company_logo/";

	public static function upload($request)
    {
        $file       = $request->file("file");
        $path       = self::IMAGE_PATH;
        $file_name  =  str_random(20).".".$file->getClientOriginalExtension();
        $file->move($path, $file_name);

        return $file_name;
    }
}
