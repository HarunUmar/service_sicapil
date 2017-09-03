<?php
 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
	include "koneksi.php";
	include "atur_id.php";
	class emp{}
	$pilih 		= $_POST['pilih'];
	if ($pilih == "reg"){
	$nama		= $_POST['nama'];
	$email	 	= $_POST['email'];
	$password 	= $_POST['password'];
	$confrim    = $_POST['confirm_password'];
	$no_hp		= $_POST['no_hp'];
	
	if (empty($nama)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Nama Masi kosong"; 
		die(json_encode($response));} 
	else if (empty($email)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "email masi kosong"; 
		die(json_encode($response));}
	else if (empty($no_hp)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "nomor hp masi kosong"; 
		die(json_encode($response));}
	else if (empty($password)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Password masi kosong"; 
		die(json_encode($response));}
	else if (empty($confrim)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Konfirmasi password anda"; 
		die(json_encode($response));}	
	else if ($password  !=  $confrim) {
		$response = new emp();
		$response->success = 0;
		$response->message = "password anda tidak sama"; 
		die(json_encode($response));}
	else {
		
		$query1 = mysql_query("SELECT * FROM user WHERE email='".$email."'");
		$cek_email = mysql_fetch_row($query1);
		if($cek_email >0){
			$response = new emp();
			$response->success = 0;
			$response->message = "Email Telah Terdaftar"; 
			die(json_encode($response));}

		}else {		
     
		$tgl_registrasi = gmdate("Y-m-d H:i:s", time() +60*60*8);
		$acak = "SICAPIL987654321ABCDEFGHIJKLMNOPQRSTUVWXYZLIPACAS";
		$pass = md5($acak. md5($password) . $acak );
		$atur_id = kode("id_user","user","sicapil","7","6");
		$level 		= "1";
		$status_aktif = "1";
		$query = mysql_query("INSERT INTO user (id_user,nama,email,no_hp,level,password,tgl_registrasi,status_aktif) VALUES ('$atur_id','$nama','$email','$no_hp','$level','$pass','$tgl_registrasi','$status_aktif')");	
		if ($query){
			$response = new emp();
			$response->success = 1;
			$response->message = "Pendaftaran Berhasil, silahkan login untuk melanjutkan";
			die(json_encode($response));} 
			else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "gagal Mendaftar";
			die(json_encode($response)); }
			}
	}
}
	else {  $response = new emp();
			$response->success = 0;
			$response->message = "opss, terjadi kesalahan";
			die(json_encode($response)); }
		
	
	
?>	