<?php 
// INI PARSER 
/* RETURN : 
lang, ftp_port, ssh_port */

if (!function_exists('iniParser')) {
	function iniParser($debug, $file = "settings.ini")
	{
		if(file_exists($file))
		{
			$parsed = parse_ini_file($file);
			return $parsed;
		
			//DEBUG MODE 
			if($debug == True)
			{
				print_r($parsed);
			}
		}
		else
		{
			  trigger_error("The $file file does not exist", E_USER_ERROR);
		}
	}
}
//print_r(iniParser(true));
?>