<?php 
include "config.php";


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['number'])) {
	$user_id = $_GET['number'];

	// write delete query
	$sql = "DELETE FROM `famoustable` WHERE `number`='$user_id'";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "Record deleted successfully.";
		header("Location: admin.php");
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}



?>