<?php
error_reporting(0);
$banner = "\e[36;1m                                                                                 
                                                                                 
           #         ######   
           #    #             
  ######   #    #  ########## 
           #    #  #        # 
           #######        ##  
##########      #       ##    
                #     ##      
                              
                                                                                 
[#] Shell Checker [#]    
                                   
Coded by : Revan AR                  
Team     : IndoSec                   
Github   : https//github.com/revan-ar/\n\n\e[0;1m";
                                                                                 
                                                                                                                                                                 
	//sleep(3);
	echo $banner;
	//sleep(2);
	echo "File list shell : ";
	$list = trim(fgets(STDIN));
	$su = file_get_contents($list);
	if (empty($su)) {
		echo "file tidak ada\n";
	}else{

	$ck = explode("\n", $su);
	echo "\nCEK HASILNYA DI shell_aktif.txt\n\n";

	foreach ($ck as $key) {

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $key);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: */*", "Accept-Language: en-US,en;q=0.5", "Accept-Encoding: gzip, deflate, br", "Referer: https://www.instagram.com/accounts/emailsignup/", "X-CSRFToken: $token[1]", "X-Instagram-AJAX: $ajax[1]", "Content-Type: application/x-www-form-urlencoded", "X-Requested-With: XMLHttpRequest", "TE: Trailers"));
	//curl_setopt($ch, CURLOPT_PROXY, $proxy[rand(1, 2550)]);
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
	//curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$data[0]&password=$data[1]&queryParams={}");
	$exe = curl_exec($ch);
	curl_close($ch);
	preg_match("/<input type=\"password\"/i", $exe, $get);
		if (!empty($get)) {
			echo $key." ==> SHELL DITEMUKAN\n";
			$file = "shell_aktif.txt";
			  touch($file);
			  $o = fopen($file, 'a');
			  fwrite($o, $key."\n");
			  fclose($o);
		}else{
			echo $key." ==> SHELL TIDAK ADA\n";
		}
			
		}
	}


?>