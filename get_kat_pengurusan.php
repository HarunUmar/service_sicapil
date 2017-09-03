<?php
 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
 
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysql_query("SELECT * FROM kategori_pengurusan WHERE id_jenis_pengurusan ='".$id."'");
	$count = mysql_num_rows($query);
	$json = '[';
	if($query) {
	while ($row = mysql_fetch_array($query)){
		$char ='"';
		$json .= '{
			"id_kategori": "'.str_replace($char,'`',strip_tags($row['id_kategori'])).'", 
			"id_jenis_pengurusan": "'.str_replace($char,'`',strip_tags($row['id_jenis_pengurusan'])).'", 
			"nama_kategori": "'.str_replace($char,'`',strip_tags($row['nama_kategori'])).'",
			"status_aktif": "'.str_replace($char,'`',strip_tags($row['status_aktif'])).'",
			"url_icon": "'.str_replace($char,'`',strip_tags($row['url_icon'])).'"},';
	}
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	}
	else{
		$json = '[{ "id_ketegori": "", "id_jenis_pengurusan": "", "nama_kategori": "", "status_aktif": "", "url_icon": ""}]';
	}
	echo $json;
	mysql_close($connect);
?>