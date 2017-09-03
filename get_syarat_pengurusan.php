<?php

 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysql_query("SELECT * FROM syarat_pengurusan WHERE id_kategori ='".$id."'");
	$count = mysql_num_rows($query);		
	$json = '[';
	if($query) {
	while ($row = mysql_fetch_array($query)){
		$char ='"';
		$json .= '{
			"id_kategori": "'.str_replace($char,'`',strip_tags($row['id_kategori'])).'", 
			"id_syarat": "'.str_replace($char,'`',strip_tags($row['id_syarat'])).'", 
			"persyaratan": "'.str_replace($char,'`',strip_tags($row['persyaratan'])).'",
			"status_aktif": "'.str_replace($char,'`',strip_tags($row['status_aktif'])).'"},';
	}
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	}
	else{
		$json = '[{ "id_ketegori": "", "id_syarat": "", "persyaratan": "", "status_aktif": ""}]';
	}
	echo $json;
	mysql_close($connect);
?>