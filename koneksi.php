<?php
	error_reporting(0);
	// ganti username dengan username mysql anda, default : root
	define('DB_USER', "username");
	// ganti password dengan password mysql anda, default : "" (dikosongkan)
	define('DB_PASSWORD', "password");
	// nama database volley, ganti apabila anda memberi nama yang berbeda
	define('DB_DATABASE', "volley");
	define('DB_SERVER', "localhost");

	class DB_CONNECT {
		public $con;
		
		function __construct() {
			$this->connect();
		}
	 
		function __destruct() {
			$this->close();
		}
	 
		function connect() {
			$this->$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
			
			/* check connection */
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
	 
			return $this->$con;
		}
	 
		function close() {
			mysqli_close($this->$con);
		}
	}
