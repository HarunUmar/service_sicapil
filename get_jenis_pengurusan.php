<?php

 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */

	include "koneksi.php";
	$query = mysql_query("SELECT * FROM jenis_pengurusan");	
	$count = mysql_num_rows($query);
	$json = '[';
	if($query) {
	while ($row = mysql_fetch_array($query)){
		$char ='"';
		$json .= '{
			"id_jenis_pengurusan": "'.str_replace($char,'`',strip_tags($row['id_jenis_pengurusan'])).'", 
			"jenis_pengurusan": "'.str_replace($char,'`',strip_tags($row['jenis_pengurusan'])).'",
			"url_icon": "'.str_replace($char,'`',strip_tags($row['url_icon'])).'"},';
	}
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	}
	else{
		$json = '[{ "id_jenis_pengurusan": "", "jenis_pengurusan": "", "url_icon": ""}]';
	}
	echo $json;
	mysql_close($connect);
?>