<?php

 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysql_query("SELECT * from user WHERE id_user ='".$id."'");
	$json = '[';
	if($query) {
	while ($row = mysql_fetch_array($query)){
		$char ='"';
		$json .= '{
			"nama": "'.str_replace($char,'`',strip_tags($row['nama'])).'", 
			"email": "'.str_replace($char,'`',strip_tags($row['email'])).'", 
			"no_hp": "'.str_replace($char,'`',strip_tags($row['no_hp'])).'"},';
	}
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	}
	else{
		$json = '[{ "nama": "", "email": "","no_hp": ""}]';
	}
	echo $json;
	mysql_close($connect);
?>