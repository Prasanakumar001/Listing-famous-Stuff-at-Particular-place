<!--------login -------->
<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!----codingend-------->

<?php 
include "config.php";
$msg="";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$country_php = $_POST['country_name'];
		$state_php= $_POST['state_name'];
		$district_php = $_POST['district_name'];
		$city_php= $_POST['city_name'];

	
	
    //write sql query
		$sql = "INSERT INTO `statesanddistrict`(`country`, `state`, `district`, `city`) VALUES ('$country_php','$state_php','$district_php','$city_php')";

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


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>new project for hackthon</title>
<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
  <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>

	<h1>option catergory</h1>
<form action="" method="POST" enctype="multipart/form-data">

<label>country</label>
<input type="text" name="country_name" style="color: black;" required>
<br>
<label>state</label>
<input type="text" name="state_name" style="color: black;" required>
<br>
<label>district</label>
<input type="text" name="district_name" style="color: black;" required>
<label>city</label>
<input type="text" name="city_name" style="color: black;" required>
<br><br>
<button type="submit" name="submit" value="submit" style="color: black;border: 5px solid red;padding: 10px 15px;input:hover:cursor:pointer ;">submit</button>
      
  
</form>
<h1>verify option</h1>
<label for="country">Choose a country:</label>
<input type="text" name="country" list="countrynames">
<datalist id="countrynames">
	<option>choose country</option>
	<?php
        include "config.php"; // Using database connection file here

        $records = mysqli_query($conn,"select country from statesanddistrict"); // fetch data from database

	while($data = mysqli_fetch_array($records))
        {
          ?>
	<option value="<?php echo $data['country']; ?>" ><?php echo $data['country']; ?></option>

        <?php
        }

        ?>
</datalist>

<label for="state">Choose a state:</label>
<input type="text" name="state" list="statenames">
<datalist id="statenames">
	<option>choose state</option>
	<?php
        include "config.php"; // Using database connection file here

        $records = mysqli_query($conn,"select state from  statesanddistrict"); // fetch data from database

	while($data = mysqli_fetch_array($records))
        {
          ?>
	<option value="<?php echo $data['state']; ?>"><?php echo $data['state']; ?></option>

        <?php
        }

        ?>
	
</datalist>
<label for="district">Choose a district:</label>
<input type="text" name="district" list="districtnames">
<datalist id="districtnames">
	<option>choose district</option>
	<?php
        include "config.php"; // Using database connection file here

        $records = mysqli_query($conn,"select district from  statesanddistrict"); // fetch data from database

	while($data = mysqli_fetch_array($records))
        {
          ?>
	<option value="<?php echo $data['district']; ?>"><?php echo $data['district']; ?></option>

        <?php
        }

        ?>
	
</datalist>
<label for="city">Choose a city:</label>
<input type="text" name="city" list="citynames">
<datalist id="citynames">
	<option>choose city</option>
	<?php
        include "config.php"; // Using database connection file here

        $records = mysqli_query($conn,"select city from  statesanddistrict"); // fetch data from database

	while($data = mysqli_fetch_array($records))
        {
          ?>
	<option value="<?php echo $data['city']; ?>"><?php echo $data['city']; ?></option>

        <?php
        }

        ?>
</datalist>

<?php mysqli_close($conn);  // close connection ?>


        
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Open modal
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <table  class="table table-bordered">
  <tr>
  	<th>number</th>
    <th>country</th>
    <th>state</th>
    <th>district</th>
    <th>city</th>
    <th>action</th>
  </tr>
  <?php

         include "config.php"; // Using database connection file here

        $records = mysqli_query($conn,"select * from statesanddistrict"); // fetch data from database

   while($data = mysqli_fetch_array($records))
        {
           ?>
  <tr >
  	<td><?php echo $data['number']; ?></td>
    <td><?php echo $data['country']; ?></td>
    <td><?php echo $data['state']; ?></td>
    <td><?php echo $data['district']; ?></td>
    <td><?php echo $data['city']; ?></td>
    <td><a style="border:2px solid white;color:white;text-decoration: none;background: black;border-radius: 10px;padding: 5px;" href="delete.php?number=<?php echo $data['number']; ?>">Delete</a></td>
  </tr>
  <tr>
  <?php
}

?>
</tr>
</table>
<?php mysqli_close($conn);  // close connection ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<h1>table for famousthings</h1>
             <!-----------------------------------------famous table----------------------------------------------->
<?php 
include "config.php";
$msg="";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit_famous'])) {
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
		$sql1 = "INSERT INTO `famoustable`( `country`, `state`, `district`, `city`, `famousplace`, `famousfood`, `famousfriut`, `handicraft`, `farming`) VALUES ('$country_php','$state_php','$district_php','$city_php','$famousplace_php','$famousfood_php','$famousfriut_php','$handicraft_php','$farming_php')";

		// execute the query
		$result = $conn->query($sql1);
		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql1 . "<br>". $conn->error;
		}

		$conn->close();

	}

?>
<form action="" method="POST" enctype="multipart/form-data">

<label>country</label>
<input type="text" name="country_name" style="color: black;" required>
<br>
<label>state</label>
<input type="text" name="state_name" style="color: black;" required>
<br>
<label>district</label>
<input type="text" name="district_name" style="color: black;" required>
<label>city</label>
<input type="text" name="city_name" style="color: black;" required>
<label>famous place</label>
<input type="text" name="famousplace_name" style="color: black;" >
<label>famous food</label>
<input type="text" name="famousfood_name" style="color: black;" >
<label>famous friut</label>
<input type="text" name="famousfriut_name" style="color: black;" >
<label>handicraft</label>
<input type="text" name="handicraft_name" style="color: black;" >
<label>farming</label>
<input type="text" name="farming_name" style="color: black;" >
<br><br>
<button type="submit" name="submit_famous" value="submit_famous" style="color: black;border: 5px solid red;padding: 10px 15px;input:hover:cursor:pointer ;">submit</button>
</form>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal1">
  Open modal
</button>


<!-- The Modal -->
<div class="modal modal-dialog-scrollable " id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <table  class="table table-bordered">
  <tr>
  	<th>number</th>
    <th>country</th>
    <th>state</th>
    <th>district</th>
    <th>city</th>
  	<th>famousplace</th>
    <th>famousfood</th>
    <th>famousfuirt</th>
    <th>handicrafts</th>
    <th>farming</th>
    <th>action</th>
  </tr>
  <?php

         include "config.php"; // Using database connection file here

        $records = mysqli_query($conn,"select * from famoustable"); // fetch data from database

   while($data = mysqli_fetch_array($records))
        {
           ?>
  <tr >
  	<td><?php echo $data['number']; ?></td>
  	<td><?php echo $data['country']; ?></td>
    <td><?php echo $data['state']; ?></td>
    <td><?php echo $data['district']; ?></td>
    <td><?php echo $data['city']; ?></td>
    <td><?php echo $data['famousplace']; ?></td>
    <td><?php echo $data['famousfood']; ?></td>
    <td><?php echo $data['famousfriut']; ?></td>
    <td><?php echo $data['handicraft']; ?></td>
    <td><?php echo $data['farming']; ?></td>
     <td><a style="border:2px solid white;color:white;text-decoration: none;background: black;border-radius: 10px;padding: 5px;" href="delete_famous.php?number=<?php echo $data['number']; ?>">Delete</a></td>
  </tr>
  <tr>
  <?php
}

?>
</tr>
</table>
<?php mysqli_close($conn);  // close connection ?>
 </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

                                                   <!-------------famousplace---------------->
<?php 
include "config.php";
$msg1="";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['famousplace'])) {
		// get variables from the form
		$image=$_FILES['image']['name'];
		$tempname = $_FILES["image"]["tmp_name"]; 
		$target="C:\\xampp\\htdocs\\allinone/".$image;
		$famousplace_name = $_POST['name_'];
		$district = $_POST['district'];
		$history = $_POST['history'];
		$location = $_POST['location'];

	
    //write sql query
		$sql3 = "INSERT INTO `famousplace`(`name`, `district`, `history`,`location`,`image3`) VALUES ('$famousplace_name','$district','$history','$location','$image')";

		// execute the query
		$result = $conn->query($sql3);
		if (move_uploaded_file($tempname, $target))  {
            $msg1 = "Image uploaded successfully";
        }else{
            $msg1 = "Failed to upload image";
        }

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql3 . "<br>". $conn->error;
		}

		$conn->close();

	}

?>


	<div class="modal modal-dialog-scrollable " id="myModal11">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <table  class="table table-bordered">
  <tr>
  	<th>image</th>
    <th>id</th>
    <th>placename</th>
    <th>district</th>
    <th>histroy</th>
  	<th>location</th>
    <th>action</th>
    
  </tr>
	<?php

         include "config.php"; // Using database connection file here
         $records = mysqli_query($conn,"SELECT * from famousplace "); // fetch data from database

        
        while($data = mysqli_fetch_array($records))
        {
           ?>
      <tr>     
		<td><img src="<?php echo $data['image3']; ?>" alt="somethingwent wrong"  width="100px" height="100px" ></td>
		
<td><?php echo $data['id']; ?></td>		
<td><?php echo $data['name']; ?></td>
<td><?php echo $data['district']; ?></td>
<td><?php echo $data['history']; ?></td>
<td><?php echo $data['location']; ?></td>
<td><a style="border:2px solid white;color:white;text-decoration: none;background: black;border-radius: 10px;padding: 10px 20px;float: right;" href="delete_famousplace.php?id=<?php echo $data['id']; ?>">Delete</a></td>

</tr>
<tr>
<?php
}
?>
</tr>
</table>
<?php mysqli_close($conn);  // close connection ?>
</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<h1>famous place database</h1>
<form action="" method="POST" enctype="multipart/form-data">

	
<label>file name:</label><br>
<input type="file" name="image" style="color: black;"><br>
<input type="hidden" name="size" value="1000000">
<label>name of the place</label>
<input type="text" name="name_" style="color: black;">
<br>
<label>district</label>
<input type="text" name="district" style="color: black;">
<br>
<label>history</label>
<textarea type="text" name="history" style="color: black;"></textarea>
<label>location</label>
<input type="text" name="location" style="color: black;">
<br><br>
<button type="submit" name="famousplace" value="famousplace" style="color: black;border: 5px solid red;padding: 10px 15px;input:hover:cursor:pointer ;">submit</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal11">
  Open modal
</button>
</form>
<!----------------------------------famousFood---------------------------->     
<h1>famous food database</h1>
<form action="" method="POST" enctype="multipart/form-data">

	
<label>file name:</label><br>
<input type="file" name="image" style="color: black;"><br>
<input type="hidden" name="size" value="1000000">
<label>name of the place</label>
<input type="text" name="name_" style="color: black;">
<br>
<label>district</label>
<input type="text" name="district" style="color: black;">
<br>
<label>history</label>
<textarea type="text" name="history" style="color: black;"></textarea>
<label>location</label>
<input type="text" name="location" style="color: black;">
<br><br>
<button type="submit" name="famousfood" value="famousplace" style="color: black;border: 5px solid red;padding: 10px 15px;input:hover:cursor:pointer ;">submit</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal12">
  Open modal
</button>
</form>
  

<?php 
include "config.php";
$msg2="";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['famousfood'])) {
		// get variables from the form
		$image=$_FILES['image']['name'];
		$tempname = $_FILES["image"]["tmp_name"]; 
		$target="C:\\xampp\\htdocs\\allinone/".$image;
		$famousplace_name = $_POST['name_'];
		$district = $_POST['district'];
		$history = $_POST['history'];
		$location = $_POST['location'];

	
    //write sql query
		$sql4 = "INSERT INTO `famousfood`(`name`, `district`, `history`,`location`,`image3`) VALUES ('$famousplace_name','$district','$history','$location','$image')";

		// execute the query
		$result = $conn->query($sql4);
		if (move_uploaded_file($tempname, $target))  {
            $msg2 = "Image uploaded successfully";
        }else{
            $msg2 = "Failed to upload image";
        }

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql4 . "<br>". $conn->error;
		}

		$conn->close();

	}

?>


	<div class="modal modal-dialog-scrollable " id="myModal12">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <table  class="table table-bordered">
  <tr>
  	<th>image</th>
    <th>id</th>
    <th>placename</th>
    <th>district</th>
    <th>histroy</th>
  	<th>location</th>
    <th>action</th>
    
  </tr>
	<?php

         include "config.php"; // Using database connection file here
         $records = mysqli_query($conn,"SELECT * from famousfood "); // fetch data from database

        
        while($data = mysqli_fetch_array($records))
        {
           ?>
      <tr>     
		<td><img src="<?php echo $data['image3']; ?>" alt="somethingwent wrong"  width="100px" height="100px" ></td>
		
<td><?php echo $data['id']; ?></td>		
<td><?php echo $data['name']; ?></td>
<td><?php echo $data['district']; ?></td>
<td><?php echo $data['history']; ?></td>
<td><?php echo $data['location']; ?></td>
<td><a style="border:2px solid white;color:white;text-decoration: none;background: black;border-radius: 10px;padding: 10px 20px;float: right;" href="delete_famousfood.php?id=<?php echo $data['id']; ?>">Delete</a></td>

</tr>
<tr>
<?php
}
?>
</tr>
</table>
<?php mysqli_close($conn);  // close connection ?>
</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

</body>
</html>