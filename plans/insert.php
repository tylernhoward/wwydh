<?php
	session_start();
	include "../helpers/conn.php";
	require_once "../helpers/vars.php";

	$plan = $_GET["id"];
	$manager = $_SESSION["user"]["id"];
	echo "plan is $plan and manager is $manager";

	//add as a new project in sql

	$q="INSERT INTO project_test(plan_id, manager_id) VALUES('$plan','$manager')";
	$result=mysqli_query($conn,$q)or die(mysqli_error($conn));

	//update plan as being publishded

	$updateq = "UPDATE plans SET published= 1 WHERE id = '$plan'";
	$result=mysqli_query($conn,$updateq)or die(mysqli_error($conn));

	//update user as manager

	$updateuser = "UPDATE users SET manager= '$plan' WHERE id = '$manager'";
	$result=mysqli_query($conn,$updateuser)or die(mysqli_error($conn));

	//$updateman = "INSERT INTO manager_of(user_id, plan_id) VALUES('$manager','$plan')";
	//$result=mysqli_query($conn,$updateman)or die(mysqli_error($conn));
	//echo '<p><a href="../projects" target="_blank">Projects</a></p>';
	?>
	<!DOCTYPE html>
	<html>
	<head>
	  <title> New Project</title>
	  <link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
	  <link href="../helpers/splash.css" type="text/css" rel="stylesheet" />
	  <link href="../plans/new/styles.css" type="text/css" rel="stylesheet" />
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <script src="https://use.fontawesome.com/42543b711d.js"></script>
	  <script src="../helpers/globals.js" type="text/javascript"></script>
	  <script src="../plans/new/scripts.js" type="text/javascript"></script>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">
	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script>$( function() {$( "#accordion" ).accordion();} );</script>
	</head>
	<body>
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
	              <a href="#"><li>Sign up</li></a>
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
	                <a href="../projects"><li>Projects</li></a>
	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>
	<div class="outside" class="width">
		<div id="wrapper">
				<div class="pane active" data-index="1">
					<!-- Successful Submission -->
				<div class="pane-content">
					<div class="panel">
						<div class="pane-content-intro">
							You are now the project manager! Let's take a look at the taskboard and make this a reality!
						</div>
						<div class="success-marker">
							<i class="fa fa-check" aria-hidden="true"></i>
						</div>
					</div>
		</div>
		<!-- Once backend works can redirect to created Project -->
		<a href="../projects">
			<div class="next">Go to Projects</div>
			</a>
		</div>
	</div>
	</div>
</body>
</html>
