<?php

function dot($ii){
	global $mr;
	global $hj;
	if ($ii == 0){echo " {$mr}█████\r";}
	if ($ii == 5 or $ii == 10 or $ii == 15 or $ii == 20 or $ii == 25 or $ii == 30 or $ii == 35 or $ii == 40 or $ii == 45 or $ii == 50 or $ii == 55 or $ii == 60){echo " {$hj}█{$mr}████\r";}
	if ($ii == 4 or $ii == 9 or $ii == 14 or $ii == 19 or $ii == 24 or $ii == 29 or $ii == 34 or $ii == 39 or $ii == 44 or $ii == 49 or $ii == 54 or $ii == 59){echo " {$mr}█{$hj}█{$mr}███\r";}
	if ($ii == 3 or $ii == 8 or $ii == 13 or $ii == 18 or $ii == 23 or $ii == 28 or $ii == 33 or $ii == 38 or $ii == 43 or $ii == 48 or $ii == 53 or $ii == 58){echo " {$mr}██{$hj}█{$mr}██\r";}
	if ($ii == 2 or $ii == 7 or $ii == 12 or $ii == 17 or $ii == 22 or $ii == 27 or $ii == 32 or $ii == 37 or $ii == 42 or $ii == 47 or $ii == 52 or $ii == 57){echo " {$mr}███{$hj}█{$mr}█\r";}
	if ($ii == 1 or $ii == 6 or $ii == 11 or $ii == 16 or $ii == 21 or $ii == 26 or $ii == 31 or $ii == 36 or $ii == 41 or $ii == 46 or $ii == 51 or $ii == 56){echo " {$mr}████{$hj}█\r";}
}
function waktu($d){
	global $mr;
	global $kn;
	global $non;
	$m = floor($d/60);
	$s = $d%60;
	if ($s > 0){
		$sss = $s - "1";
		for ($ss=$sss;$ss>-1;$ss--){
			print "\r {$kn}menunggu {$mr}{$m}{$non}:{$mr}{$ss} {$kn}menit{$non}";
			dot($ss);
			sleep(1);
			print "\r                                                 \r";
			}
		}
	$mnt = $m - "1";
	for($mm=$mnt;$mm>-1;$mm--){
	for ($ii=59;$ii>-1;$ii--){
		print "\r {$kn}menunggu {$mr}{$mm}{$non}:{$mr}{$ii} {$kn}menit{$non}";
		dot($ii);
		sleep(1);
		print "\r                                                 \r";
		}
	}
}
function post($url, $dat){
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	$header=array(
	'accept: application/json, text/plain, */*',
    'Content-Type: application/json;charset=utf-8', 
    'Host: nano-now-api.herokuapp.com', 
    'Connection: Keep-Alive', 
    'User-Agent: okhttp/3.12.12'
    );
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$dat);
	$res=curl_exec($ch);
	curl_close($ch);
	return $res;
	}
function gets($url){
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	$header=array(
	'accept: application/json, text/plain, */*',
    'Host: nano-now-api.herokuapp.com', 
    'Connection: Keep-Alive', 
    'User-Agent: okhttp/3.12.12'

	);
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	$res=curl_exec($ch);
	curl_close($ch);
	return $res;
	}