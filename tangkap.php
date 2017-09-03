<?php

 /**
 * Created by arun on 22/08/2017.
 * site https://tarsiustech.com
 */
 
 
	include_once "koneksi.php";
	
	class emp{}
	
	
	$id_user = $_POST['id_user'];
	$id_pengurusan = $_POST['id_pengurusan'];
	$id_syarat = $_POST['id_user'];
	$id_berkas = $id_user."-".$id_syarat."-".date('YmdHis');
	$jumlah = $id['jumlah_data'];
	
	
	if (empty($id_user)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Please dont empty Name."; 
		die(json_encode($response));
	} 
	
	
	
	else {
		
		for($i=0; $i<=2; $i++){
			
		$image[$i] = $_POST['image'][$i];
		$random = random_word(20);
		
		$path = "images/".$random.".png";
		
		$actualpath = "http://localhost/upload_image/$path";
		file_put_contents($path,base64_decode($image[$i]));		
		}
	
		
		
		if ($query){
			file_put_contents($path,base64_decode($image));		
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Upload image";
			die(json_encode($response)); 
		}
	}	
	
		function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}
	
	mysqli_close($connect);
	
?>	