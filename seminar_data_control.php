<?PHP
header('Content-type:application/json');
include_once("connection.php");
if(isset($_POST['seminar_user_para'])){
	
	$seminarId = $_POST['seminar_user_para'];

	$query = "SELECT seminarForCourse,seminarSpeaker,seminarName,seminarOrganizer,seminarDescription,seminarLocation,seminarDate FROM seminarinfo WHERE id='$seminarId'";
	
	$result = mysqli_query($conn,$query)or die(mysqli_error($conn));;

	while($row= mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	echo json_encode($data);

}
?>