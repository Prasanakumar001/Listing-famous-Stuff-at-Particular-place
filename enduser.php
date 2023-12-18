<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>hackthon</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
	



<form action="" method="POST" enctype="multipart/form-data">
<label for="country">Choose a country:</label>
<input type="text" name="country" list="countrynames" required>
<datalist id="countrynames">
  <option>choose country</option>
  <?php
        include "config.php"; // Using database connection file here

        $records = mysqli_query($conn,"select country from statesanddistrict"); // fetch data from database

  while($data = mysqli_fetch_array($records))
        {
          ?>
  <option value="<?php echo $data['country'];?>" ><?php echo $data['country']; ?></option>

        <?php
        }

        ?>
  </datalist>

<label for="state">Choose a state:</label>
<input type="text" name="state" list="statenames" required>
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
<input type="text" name="district" list="districtnames" required>
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
<input type="text" name="city" list="citynames" required>
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
<button type="submit" name="expolre" value="explore" style="color: black;border: 5px solid red;padding: 10px 15px;input:hover:cursor:pointer ;" onclick="getElementsById('tablepk').style.visibilty='visible';">explore</button>
</form>

<?php
  $s1= "india";
  $s2= "tamilnadu";
  $s3= "madurai";
  $s4= "madurai";
if(isset($_POST['expolre'])){
  
$s1 = $_POST['country'];
$s2 = $_POST['state'];      // Storing Selected Value In Variable
$s3 = $_POST['district'];
$s4 = $_POST['city'];
echo "You have selected country is:" .$s1;  // Displaying Selected Value
echo "You have selected state is:" .$s2; 
echo "You have selected district is:" .$s3; 
echo "You have selected city is:" .$s4; 
}
?>

<table  class="table table-bordered ">
  <tr>
    <th>famousplace</th>
    <th>famousfood</th>
    <th>famousfuirt</th>
    <th>handicrafts</th>
    <th>farming</th>
  </tr>
  <?php

         include "config.php"; // Using database connection file here 

  $records = mysqli_query($conn,"SELECT famousplace,famousfood,famousfriut,handicraft,farming from famoustable WHERE country='" . $s1 . "' AND state='" . $s2 ."' AND district='" . $s3 . "' AND city='" . $s4 . "' "); // fetch data from database

   while($data = mysqli_fetch_array($records))
        {
           ?>
  <tr >
    <td><button name="<?php $s6 = $data['famousplace']; ?>" data-bs-toggle="modal" data-bs-target="#myModal5"><?php echo $data['famousplace']; ?></button></td>
    <td><button name="<?php $s7= $data['famousfood']; ?>" data-bs-toggle="modal" data-bs-target="#myModal8"><?php echo $data['famousfood']; ?></button></td>
    <td><button name="<?php echo $data['famousfriut']; ?>"><?php echo $data['famousfriut']; ?></button></td>
    <td><button name="<?php echo $data['handicraft']; ?>"><?php echo $data['handicraft']; ?></button></td>
    <td><button name="<?php echo $s4; ?>"><?php echo $data['farming']; ?></button></td>
    
  </tr>
  <tr>
  <?php
}

?>
</tr>
</table>
<?php mysqli_close($conn);  // close connection ?>
<!-----end---->
<div class="modal " id="myModal5" >
  <div class="modal-dialog ">
    <div class="modal-content ">
       <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
<?php

    include "config.php"; // Using database connection file here 
    $record1 = mysqli_query($conn,"select * from famoustable"); // fetch data from database

  $records = mysqli_query($conn,"SELECT image3,name,district,history,location from famousplace WHERE name='" . $s6 . "' AND district='" . $s3 . "'  "); // fetch data from database

   while($data = mysqli_fetch_array($records))
        {
        ?>


     

      <!-- Modal body -->
      <div class="modal-body">
          <img src="<?php echo $data['image3']; ?>"  width="200px" height="220px" style="border-radius: 10px;"><br><br>
  <h1>placename</h1>
<p><?php echo $data['name']; ?></p><br>
<h1>district</h1>
<p><?php echo $data['district']; ?></p><br>
<h1>History</h1>
<p><?php echo $data['history']; ?></p><br>
<h1>location</h1>
<p><?php echo $data['location']; ?></p>
           
           <?php
        }

?>
<?php mysqli_close($conn);  // close connection ?>
 </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!---------------------------------famousfood------------------------->
<div class="modal " id="myModal8" >
  <div class="modal-dialog ">
    <div class="modal-content ">
       <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
<?php

    include "config.php"; // Using database connection file here 
    $record1 = mysqli_query($conn,"select * from famoustable"); // fetch data from database

  $records2 = mysqli_query($conn,"SELECT image3,name,district,history,location from famousfood WHERE name='" . $s7 . "' AND district='" . $s3 . "'  "); // fetch data from database

   while($data = mysqli_fetch_array($records2))
        {
        ?>


     

      <!-- Modal body -->
      <div class="modal-body">
          <img src="<?php echo $data['image3']; ?>"  width="200px" height="220px" style="border-radius: 10px;"><br><br>
  <h1>placename</h1>
<p><?php echo $data['name']; ?></p><br>
<h1>district</h1>
<p><?php echo $data['district']; ?></p><br>
<h1>History</h1>
<p><?php echo $data['history']; ?></p><br>
<h1>location</h1>
<p><?php echo $data['location']; ?></p>
           
           <?php
        }

?>
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
