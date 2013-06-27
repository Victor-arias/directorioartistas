<?php

class Utility extends CComponent
{
	public static function createSlug($str) {
		// convert all spaces to underscores:
		$treated = trim($str);
		$treated = strtr($str, " ", "_");
		// convert what's needed to convert to nothing (remove them...)
		$treated = preg_replace('/[\!\@\#\$\%\^\&\*\(\)\+\=\~\:\.\,\;\'\"\<\>\/\\\`]/', "", $treated);

		$no_permitidas= array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ","À","Ã","Ì","Ò","Ù","´","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
		$permitidas=    array("a","e","i","o","u","A","E","I","O","U","n","N","A","A","I","O","U","","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
		$treated = str_replace($no_permitidas, $permitidas, $treated);
		// convert underscores to dashes
		$treated = strtr($treated, "_", "-");

		$treated = mb_strtolower($treated, 'UTF-8');
		
		return $treated;
	}
}