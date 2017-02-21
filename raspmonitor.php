<?php
$raspmonitor = array('version' => '0.1'); 
?>

<?php 
function raspmonitor($action)
{
	if($action == "check_temp")
	{
		$temp_cmd = exec('cat /sys/class/thermal/thermal_zone0/temp'); 
		$temp_result = $temp_cmd / 1000;
		echo $temp_result;
	}
	elseif($action == "check_ip")
	{
		$ip = exec('hostname -I');
		echo $ip;
	}
	elseif($action == "php_version")
	{
		echo phpversion();
	}
	elseif($action == "apache_version")
	{
		echo apache_get_version();
	}
	elseif($action == "os_infos")
	{
		echo php_uname();
	}
	elseif(!isset($action))
	{
		echo "Please select an action !"; 
	}
	else 
	{
		echo "Incorrect action. :/ ";
	}
}
?>