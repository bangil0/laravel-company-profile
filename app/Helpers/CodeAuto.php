<?php
namespace App\Helpers;
use Request;
use DB;

class CodeAuto
{
    public static function getMaxId($yearMonth, $field, $table) 
	{
        $row = DB::select('SELECT MAX('.$field.') as mid FROM '.$table.' WHERE '.$field.' LIKE "%'.$yearMonth.'%"');
        if ($row[0]->mid) {
            return $row[0]->mid;
        } else {
            return 'false';
        }
    }
	
	public static function getLatestNumber($code, $field, $table)
	{
		$parts = explode('-', date("d-m-Y"));
		$yearMonth = $parts[2] . $parts[1];
		$latestNumber = "";
        if (CodeAuto::getMaxId($yearMonth, $field, $table) == 'false') {
            $latestNumber = $code. $yearMonth . '0001';
		}
		else {
			$lenght = strlen($code);
			$result = CodeAuto::getMaxId($yearMonth, $field, $table);
			$id = (int) substr($result, $lenght) + 1;
			$latestNumber = $code . str_pad($id, 9, 0, STR_PAD_LEFT);
		}
		
		return $latestNumber;
	}

	public static function createAcronym($string) {
	    $output = null;
	    $token  = strtok($string, ' ');
	    while ($token !== false) {
	        $output .= $token[0];
	        $token = strtok(' ');
	    }
	    return $output;
	}

	public static function slug($slug){

		return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug)));
	}

	public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public static function capitalString($string)
    {
    	return ucwords(strtolower($string));
    }
}
