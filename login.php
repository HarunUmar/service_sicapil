<?php 

 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
 
	include "koneksi.php";
	include "atur_id.php";
	class emp{}
	$pilih 		= $_POST['pilih'];
	$acak = "SICAPIL987654321ABCDEFGHIJKLMNOPQRSTUVWXYZLIPACAS";
	if($pilih == "login")
	{
	$email	 	= $_POST['email'];
	$password 	= $_POST['password'];
	$query = mysql_query("SELECT * FROM user WHERE email='".$email."'");
	if($query) {
	$row = mysql_fetch_row($query);
		if (md5($acak . md5($password) . $acak) == $row[5])
			{
			if ($row[6] == 0) 
				{
					$response->success = 0;
					$response->message = "Akun Anda Di nonaktifkan ".$row[1].""; 
					die(json_encode($response));	
				}
			else {
					
					$response = new emp();
					$response->id_user = $row[0];
					$response->nama = $row[1];
					$response->email = $row[2];
					$response->no_hp = $row[3];
					$response->level = $row[4];
					$response->status_aktif = $row[6];
					$response->success = 1;
					$response->message = "Selamat Datang ".$row[1].""; 
					die(json_encode($response));
				}		
			}
			else {
					$response = new emp();
					$response->success = 0;
					$response->message = "Email Atau Password anda Salah"; 
					die(json_encode($response));
				}
			}
	}
			else {	
					$response = new emp();
					$response->success = 0;
					$response->message = "opps terjadi kesalahan"; 
					die(json_encode($response));
				}
?>