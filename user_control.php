<?php

include_once 'connection.php';
header('Content-Type: application/json;charset=UTF-8');
	class User{
		
		private $db;
		private $connection;
		
		function __construct(){
			$this->db = new DB_Connection();
			$this->connection = $this->db->get_connection();
		}
		public function does_user_exist($username,$password){
			$query = "SELECT * FROM users WHERE username= '$username' AND password= '$password'";
			$result = mysqli_query($this->connection,$query);
			if(mysqli_num_rows($result) >0){
				$json['success'] = ' WELCOME '.$username;
				echo json_encode($json);
				mysqli_close($this->connection);
			}
			else{
				$query = "INSERT INTO users(username,password) values ('$username','$password')";
				$inserted = mysqli_query($this->connection, $query);
				if ($inserted == 1){
					$json['success'] = 'Account Created, welcome';
				}
				else{
					$json['error'] = 'Wrong Password';
				}
				echo json_encode($json);
				mysqli_close($this->connection);
			}
		}
	}
	
	$user = new User();
	if (isset($_POST['username'],$_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if (!empty($username) && !empty($password)){
			
			$encrypted_password = md5($password);
			$user -> does_user_exist($username,$encrypted_password);
		}
		else{
			echo json_encode("You must fill both fields");
		}
	}
?>
