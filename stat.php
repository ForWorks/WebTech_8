<?php
	$file = "stat.log";   
	function getRealIpAddr() {
		if(!empty($_SERVER['HTTP_CLIENT_IP']))        
			$ip = $_SERVER['HTTP_CLIENT_IP']; 		
		else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 		
		else 
			$ip = $_SERVER['REMOTE_ADDR']; 
		return $ip;
	}	
	$ip = getRealIpAddr();	 
	$lines = file($file);	
	$lines[] = $ip."\r\n";
	file_put_contents($file, $lines);
?>