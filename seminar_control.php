<?PHP
header('Content-type:application/json');
	include_once("connection.php");
	
	$query = "SELECT id,seminarName,seminarOrganizer,seminarDescription,seminarLocation,seminarDate FROM seminarinfo";
	
	$result = mysqli_query($conn,$query);
	
	while($row= mysqli_fetch_assoc($result)){
		$data[] = $row;
		
	}
	
	echo json_encode($data);
	
?>