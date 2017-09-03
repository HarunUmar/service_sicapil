<?php
 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
 
	include "koneksi.php";
	$id_user = $_GET['id'];
	$info = "SELECT 
			c.id_pengurusan,c.nama,c.tgl_pengurusan,d.tgl_verifikasi,b.nama_kategori,a.jenis_pengurusan,d.status_verifikasi 
			FROM jenis_pengurusan as a 
			INNER JOIN kategori_pengurusan as b ON a.id_jenis_pengurusan=b.id_jenis_pengurusan 
			INNER JOIN pengurusan as c on c.id_kategori_pengurusan=b.id_kategori 
			LEFT JOIN verifikasi as d ON c.id_pengurusan=d.id_pengurusan 
			Where c.status_pengurusan='1' and c.id_user ='sicapil000001' and (d.status_aktif = '1' or d.status_aktif IS NULL) ORDER BY c.id_pengurusan DESC";

	$query = mysql_query($info);
	$json = '[';
	if($query) {
	while ($row = mysql_fetch_array($query)){
		
		$status = $row['status_verifikasi'];
	if($status == "1"){
		$status_berkas = "Proses";
	}
	else if($status == "2"){
		$status_berkas = "Selesai";
	}
	else if($status == "3"){
		$status_berkas = "Ditolak";
		
	}
	else if($status == "4"){
		$status_berkas = "Diterima";
	}
	else {
		$status_berkas = "Pending";
	}
		
		$char ='"';
		$json .= '{
			"id_pengurusan": "'.str_replace($char,'`',strip_tags($row['id_pengurusan'])).'", 
			"nama": "'.str_replace($char,'`',strip_tags($row['nama'])).'", 
			"tgl_pengurusan": "'.str_replace($char,'`',strip_tags($row['tgl_pengurusan'])).'",
			"tgl_verifikasi": "'.str_replace($char,'`',strip_tags($row['tgl_verifikasi'])).'",
			"nama_kategori": "'.str_replace($char,'`',strip_tags($row['nama_kategori'])).'",
			"jenis_pengurusan": "'.str_replace($char,'`',strip_tags($row['jenis_pengurusan'])).'",
			"status_verifikasi": "'.str_replace($char,'`',strip_tags($status_berkas)).'"},';
	}
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	}
	else{
		$json = '[{ "id_": "",
				"id_pengurusan": "", 
				"nama": "",
				"tgl_pengurusan": "",
				"tgl_verifikasi": "",
				"nama_kategori": "",
				"jenis_pengurusan": "",				
				"status_verifikasi": ""}]';
	}
	echo $json;
	mysql_close($connect);
?>