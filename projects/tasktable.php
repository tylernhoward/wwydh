<?php
include("../helpers/conn.php");
$selected_project_id = $_GET['id'];
$q = "SELECT json FROM task_test WHERE test_id= '$selected_project_id'";
$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$json = $row["json"];
?>

<p id="demo"></p>
<script>

var obj = JSON.parse('{ "name":"John", "age":30, "city":"New York"}');
document.getElementById("demo").innerHTML = obj.name + ", " + obj.age;

</script>

<!DOCTYPE html>
<html>
	<head>
		<title>All Projects</title>
		<link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
		<link href="../helpers/splash.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://use.fontawesome.com/42543b711d.js"></script>
		<script src="../helpers/globals.js" type="text/javascript"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="styles_new.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
	$( "#accordion" ).accordion();
} );
</script>
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
		<div id="splash">
			<div class="splash_content">
			</div>
			<!--<div class="new-of-type">
				Add New Plan
				<i class="fa fa-plus" aria-hidden="true"></i>
			</div> -->
		</div>

		<div class="grid-inner width">

		</div>


		<div class="grid-inner width">
			<?php
			foreach ($plans as $plan) {
				$row = $plan[0]; // selects the first element to use as the idea row since all rows have the same idea information xD ?>
				<div class="idea">
					<hr>
					<div class="grid-item width">
						<!--<div class="vote">
							<div class="upvote">
								<i class="fa fa-thumbs-up" aria-hidden="true"></i>
							</div>
							<div class="downvote">
								<i class="fa fa-thumbs-down" aria-hidden="true"></i>
							</div>
						</div>-->
						<div class="idea_image_wrapper">
							<i class="fa <?php echo $idea_categories[$row['category']]['fa-icon'] ?>"></i>
							<div class="overlay"></div>
							<div class="idea_image" style="background-image: url(../helpers/idea_images/<?php echo $row["idea image"]?>);"></div>
						</div>
						<div class="idea_desc">
							<div class="title"><?php echo $row["title"] ?></div>
							<div class="category"><?php echo $idea_categories[$row['category']]["title"] ?></div>
							<div class="description"><?php echo $row["description"] ?></div>

							<hr>
							<div class="date"><?php echo "\nWant Complete by: " . date("F j, Y", strtotime($row["date"])) ?></div>
							<div class="manage"><?php echo "\nProject Manager: " . "manager" //placeholder?></div>


							<?php /* ?>
							<?php if (count($row["checklist"]) > 0) { ?>
								<div class="checklist">
									<span>Contributors Needed: </span>
									<ul>
										<?php for ($i = 0; $i < count($row["checklist"]) && $i < 4; $i++) { ?>
											<li><?php echo $row["checklist"][$i] ?></li>
										<?php } ?>
										<?php if (count($row["checklist"]) > 4) { ?>
											<span><?php echo count($row["checklist"]) - 4 ?>+ more</span>
										<?php } ?>
									</ul>
								</div>
							<?php } ?>
							<?php */ ?>
						</div>
					</div>
					<div class="locations">
						<?php foreach($plan as $location) {
							if (isset($location["features"])) $location["features"] = implode(" | ", explode("[-]", $location["features"])); ?>

							<div class="location">
								<div class="plan-buttons options btn-group">
									<?php
										/*if user is manager display tasks if not display become a project manager*/
										if (!isset($_SESSION["user"])){ ?>
											<div class="btn op-1"><a href="../login">login</a></div>
										<?php } elseif (isset($_SESSION["user"]) && $_SESSION["user"]["manager"] == 1){ ?>
											<div class="btn op-1"><a href="redirect.php?id=<?php echo $row['id']; ?>">Edit Task Progress</a></div>
										<?php } else { ?>
											<div class="btn op-1"><a href="tasktable.php">Become a Manager</a></div>
											<div class="btn op-1"><a href="tasktable.php?id=<?php echo $row['id']; ?>">See Task Progress</a></div>
										<?php }
									?>
								</div>

								<div class="location_image" style="background-image: url(https://maps.googleapis.com/maps/api/streetview?size=600x300&location=<?php $str = $location['building_address']; $cit = $location['city']; $addURL = rawurlencode("$str $cit"); echo $addURL ?>&key=AIzaSyBHg5BuXXzfu2Wiz4QTiUjCXUTpaUCWUN0)";></div>
								<div class="location_address"><?php echo $location["building_address"]." ".$location["city"].", Maryland ".$location["zip_code"] ?></div>
								<div class="location_features"><?php echo $location["features"] ?></div>
								<div style="clear: both"></div>

							</div>

						<?php } ?>
					</div>
		 	<?php }
			?>
		</div>

	</div>
		<div id="footer">
            <div class="grid-inner">
                &copy; Copyright WWYDH <?php echo date("Y") ?>
            </div>
        </div>
	</body>
</html>
