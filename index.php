<?PHP
include_once("connection.php");
if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])){
	
	$username = $_POST['txtUsername'];
	$password = $_POST['txtPassword'];
	$query = "SELECT * FROM users WHERE BINARY username='$username' AND BINARY password='$password'";
	
	$result = mysqli_query($conn,$query);
	if($result->num_rows > 0){
		echo "success";
		exit;
	}
	else{
		echo "Wrong input";
		echo $result->num_rows;
		exit;
	}
}
?>
<html>
<head><title>Login</title></head>
	<body>
		<form action="<?PHP $_PHP_SELF ?>" method="post">
			Username <input type="text" name="txtUsername" value=""
			placeholder="Enter Username"/></br>
			Password <input type="password" name="txtPassword" value=""
			placeholder="Enter Password"/></br>
			<input type="submit" name="btnSubmit" value="Login"/>
		</form>
	</body>
</html>