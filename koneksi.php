<?php

 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
	$server		= "localhost"; //sesuaikan dengan nama server
	$user		= "root"; //sesuaikan username
	$password	= ""; //sesuaikan password
	$database	= "sicapil"; //sesuaikan target databese
	$connect = mysql_connect($server, $user, $password) or die ("Koneksi gagal!");
	mysql_select_db($database) or die ("Database belum siap!");
?>