<?php
  include "../helpers/conn.php";
  //$servername = "wwydh-mysql.cqqq2sesxkkq.us-east-1.rds.amazonaws.com";
  //$username = "wwydh_a_team";
  //$password = "nzqbzNU3drDhVsgHsP4f";

  //$conn = new mysqli($servername, $username, $password, "wwydh");
  $theQuery = "SELECT * FROM locations WHERE `id`='{$_GET["id"]}'";
  $result = $conn->query($theQuery);
  $rowcount = mysqli_num_rows($result);
  $row = @mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html>

<head>
    <title>https://maps.googleapis.com/maps/api/streetview?size=600x300&location=<?php echo rawurlencode("$row['building_address'] $row['city']" . "&key=AIzaSyBHg5BuXXzfu2Wiz4QTiUjCXUTpaUCWUN0")?></title>
</head>


</html>
