
	<?php
		include "../helpers/conn.php";
		$planquery = "SELECT * FROM plans WHERE `id`='{$_GET["id"]}'";
		$allplans = $conn->query($planquery);
  ?>

	<!DOCTYPE html>
	<html>
			<link href="infostyle.css" type="text/css" rel="stylesheet" />

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
															<a href="../ideas" ><li>Ideas</li></a>
															<a href="../plans" class="active"><li>Plans</li></a>
															<a href="../projects"><li>Projects</li></a>
													</ul>
											</div>
									</div>
							</div>
				</div>
				<br>



		    <title><?php echo $row["title"] ?></title>
    </head>

		<body>
		<?php
			while($planrow = $allplans->fetch_assoc()){
				$ideaquery = "SELECT * FROM ideas WHERE id = '" . $planrow['idea_id'] . "' LIMIT 1";
				$anidea = $conn->query($ideaquery);
				while($idearow = $anidea->fetch_assoc()){

		?>
	     <div class="imgViewer" style="background-image: url(../helpers/idea_images/<?php echo $idearow["image"]?>);"></div>
       <div class="namebig"><?php echo $planrow["title"] ?></div>
	   <div class="name"><?php echo $idearow["title"] ?></div>
       <div class="info">
	   			<div class="description"><?php echo $idearow["description"] ?> </div>
          <div class="generalInfo">
			<div class="leftcards">
			<h4>Permits Required</h4>
		  <?php
				$permitquery = "SELECT * FROM Permit WHERE PlanID = '" . $planrow['id'] . "'";
				$allpermits = $conn->query($permitquery);
				while($permitrow = $allpermits->fetch_assoc()){
			?>
			<div class="permits"><?php echo $permitrow["Description"] ?> </div>
			<?php } ?>
			</div>
			<div class="rightcards">
			<h4>Tasks Entered</h4>
			<?php
				$taskquery = "SELECT * FROM PlanTasks WHERE PlanID = '" . $planrow['id'] . "'";
				$alltasks = $conn->query($taskquery);
				while($taskrow = $alltasks->fetch_assoc()){
			?>
			<div class="tasks"><?php echo $taskrow["Task"] ?> </div>
			<?php } ?>
			</div>
		  </div>
		  <div style="clear: both;"></div>
          </div>
		<?php
			}
			}
		?>
    </body>
</html>
