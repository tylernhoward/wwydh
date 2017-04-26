
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
			<link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
			<meta charset="utf-8">
			<div class="width">
				<div id="nav">
								<div class="nav-inner width clearfix <?php if (isset($_SESSION['user'])) echo 'loggedin' ?>">
										<a href="../home">
												<div id="logo"></div>
												<div id="logo_name">What Would You Do Here?</div>
												<div class="spacer"></div>
										</a>
										<div id="user_nav" class="nav">
												<?php if (!isset($_SESSION["user"])) { ?>
														<ul>
																<a href="../login"><li>Log in</li></a>
																<a href="../signup"><li>Sign up</li></a>
																<a href="../contact"><li>Contact</li></a>
														</ul>
												<?php } else { ?>
														<div class="loggedin">
																<span class="click-space">
																		<span class="chevron"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
																		<div class="image" style="background-image: url(../helpers/user_images/<?php echo $_SESSION["user"]["image"] ?>);"></div>
																		<span class="greet">Hi <?php echo $_SESSION["user"]["first"] ?>!</span>
																</span>

																<div id="nav_submenu">
																		<ul>
																				<a href="../dashboard"><li>Dashboard</li></a>
																				<a href="../profile"><li>My Profile</li></a>
																				<a href="../helpers/logout.php?go=home"><li>Log out</li></a>
																		</ul>
																</div>
														</div>
												<?php } ?>
										</div>
										<div id="main_nav" class="nav">
												<ul>
														<a href="../locations"><li>Locations</li></a>
														<a href="../ideas"><li>Ideas</li></a>
														<a href="../plans"><li>Plans</li></a>
														<a href="../projects" class="active"><li>Projects</li></a>
												</ul>
										</div>
								</div>
						</div>
			</div>


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
