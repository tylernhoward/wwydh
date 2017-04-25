
	<?php
		include "../helpers/conn.php";
		//$servername = "wwydh-mysql.cqqq2sesxkkq.us-east-1.rds.amazonaws.com";
		//$username = "wwydh_a_team";
		//$password = "nzqbzNU3drDhVsgHsP4f";

		//$conn = new mysqli($servername, $username, $password, "wwydh");
		$theQuery = "SELECT * FROM ideas WHERE `id`='{$_GET["id"]}'";
		$result = $conn->query($theQuery);
		$row = @mysqli_fetch_array($result);


  ?>

<!DOCTYPE html>
<html>

    <link href="styles.css" type="text/css" rel="stylesheet" />

    <head>
		    <title><?php echo $row["title"] ?></title>
    </head>

		<body>
	     <div class="imgViewer" style="background-image: url(../helpers/idea_images/ajhdjwugq.jpg)";></div>
       <div class="name"><?php echo $row["title"] ?></div>
       <div class="postedDate">Posted by: <?php echo $row["owner"] ?> on <?php echo $row["timestamp"] ?></div>
       <div class="info">
          <div class="generalInfo">
						<div class="description"><?php echo $row["description"] ?> </div>
<!--
						<br>
		           	<h1>Requirements:</h1>
          	<ul>
							<li><b>Example 1</li>
		          <li><b>Example 2</li>
							<li><b>Example 3</li>
          	</ul>
					</br>
-->
					</div>
						<div style="clear: both;"></div>
          </div>
    </body>
</html>
