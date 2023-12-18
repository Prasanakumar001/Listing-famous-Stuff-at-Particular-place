<?php 
include "config.php";
include "admin.php";
$msg="";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$country_php = $_POST['country_name'];
		$state_php= $_POST['state_name'];
		$district_php = $_POST['district_name'];
		$city_php= $_POST['city_name'];
		$famousplace_php= $_POST['famousplace_name'];
		$famousfood_php= $_POST['famousfood_name'];
		$famousfriut_php= $_POST['famousfriut_name'];
		$handicraft_php= $_POST['handicraft_name'];
		$farming_php= $_POST['farming_name'];
		

	
	
    //write sql query
		$sql = "INSERT INTO `famoustable`( `country`, `state`, `district`, `city`, `famousplace`, `famousfood`, `famousfriut`, `handicraft`, `farming`) VALUES ('$country_php','$state_php','$district_php','$city_php','$famousplace_php','$famousfood_php','$famousfriut_php','$handicraft_php','$farming_php',)";

		// execute the query
		$result = $conn->query($sql);
		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}

?>