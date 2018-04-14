<?php
	require_once __DIR__ . '/koneksi.php';
	$db = new DB_CONNECT();

	header("Content-Type:application/json");

	$parameter = array(
		'id' => $_POST['id'],
		'nama' => $_POST['nama'],
		'harga' => $_POST['harga'],
		'deskripsi' => $_POST['deskripsi'],
		'action' => $_POST['action'],
	);

	$response = array(
		'error' => FALSE,
		'error_text' => "",
	);
	
	//validasi
	if($response['error'] == FALSE){
		if($parameter['action'] == ""){
			$response['error'] = TRUE;
			$response['error_text'] = "Parameter tidak lengkap".$parameter['nama'];
		}
	}

	if($response['error'] == FALSE){
		switch($parameter['action']){
			case "add":
				$kuery = "INSERT INTO `products` (`nama`, `harga`, `deskripsi`) VALUES ('".$parameter['nama']."', '".$parameter['harga']."', '".$parameter['deskripsi']."')";
				if (mysqli_query($db->connect(), $kuery)) {
					header("HTTP/1.1 200");
					$response["error"] = FALSE;
					$response["error_text"] = "Berhasil";
				} else {
					header("HTTP/1.1 500");
					$response["error"] = TRUE;
					$response["error_text"] = "Error: ".$sql." ".mysqli_error($conn);
				}
				$db->close();
				break;
			case "edit":
				$kuery = "UPDATE `products` SET `nama`='".$parameter['nama']."', `harga`='".$parameter['harga']."', `deskripsi`='".$parameter['deskripsi']."' WHERE `id`='".$parameter['id']."'";
				if (mysqli_query($db->connect(), $kuery)) {
					header("HTTP/1.1 200");
					$response["error"] = FALSE;
					$response["error_text"] = "Berhasil";
				} else {
					header("HTTP/1.1 500");
					$response["error"] = TRUE;
					$response["error_text"] = "Error: ".$sql." ".mysqli_error($conn);
				}
				$db->close();
				break;
			case "delete":
				$kuery = "DELETE FROM `products` WHERE (`id`='".$parameter['id']."')";
				if (mysqli_query($db->connect(), $kuery)) {
					header("HTTP/1.1 200");
					$response["error"] = FALSE;
					$response["error_text"] = "Berhasil";
				} else {
					header("HTTP/1.1 500");
					$response["error"] = TRUE;
					$response["error_text"] = "Error: ".$sql." ".mysqli_error($conn);
				}
				$db->close();
				break;
		}
	}
	
	echo json_encode($response);
