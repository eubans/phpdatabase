<?PHP
header('Content-type:application/json');
include_once("connection.php");
if(isset($_POST['user_para'])){
	
	$username = $_POST['user_para'];

	$query = "SELECT * FROM users WHERE username='$username'";
	
	$result = mysqli_query($conn,$query);
	
	while($row= mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	echo json_encode($data);

}
?>
