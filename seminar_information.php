<?PHP
header('Content-type:application/json');
	include_once("connection.php");
	if(isset($_POST['seminar_user_para'])){
	
	$seminarId = $_POST['seminar_user_para'];
	
	$query = "SELECT `seminarInformation` FROM seminarinfo WHERE `id` = $seminarId ";
	
	$result = mysqli_query($conn,$query) or die (mysqli_error($conn));
	
	while($row= mysqli_fetch_assoc($result)){
		echo $row['seminarInformation'];
	}
	}
?>