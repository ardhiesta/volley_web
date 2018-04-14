<?php
	require_once __DIR__ . '/koneksi.php';
	$db = new DB_CONNECT();
	
	header("Content-Type:application/json");

	$response = array(
		'error' => FALSE,
		'error_text' => "",
		'data' => array(),
	);
	
	if($response['error'] == FALSE){
		$result = mysqli_query($db->connect(), "SELECT * FROM products");
		if (mysqli_num_rows($result) > 0) {
			$hasil = array();
			while ($col = mysqli_fetch_assoc($result)) {
				$product = array(
					'id' =>	$col['id'],
					'nama' => $col['nama'],
					'harga' =>	$col['harga'],
					'deskripsi' => $col['deskripsi'],
					'created_at' =>	$col['created_at'],
					'updated_at' =>	$col['updated_at'],
				);
				$hasil[$col['id']] = $product;
			}
			
			header("HTTP/1.1 200");
			$response['error'] = FALSE;
			$response['error_text'] = "Berhasil";
			$response['data'] = $hasil;
		} else {
			header("HTTP/1.1 404");
			$response['error'] = TRUE;
			$response['error_text'] = "No products found";
		}
	}
	 
	echo json_encode($response);
