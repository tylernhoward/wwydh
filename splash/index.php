<!DOCTYPE HTML>

<html>
	<head>
		<title>WWYDH Welcome</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="https://use.fontawesome.com/42543b711d.js"></script>

		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-small.css" />
		</noscript>
		<link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
		<link href="../helpers/splash.css" type="text/css" rel="stylesheet" />
	</head>
	<body id="top">
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
												<a href="../projects"><li>Projects</li></a>
										</ul>
								</div>
						</div>
				</div>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>W W Y D H</h2>
					<p>A solution to revitalize the neighborhoods of Baltimore through community involvement</p>
					<ul class="actions">
						<li><a href="../signup" class="button big special">Sign Up</a></li>
						<li><a href="#one" id="learnmore" class="button big alt">Learn More</a></li>
					</ul>
				</div>
			</section>



		<!-- one -->
			<section id="one" class="wrapper style2">
				<header class="major">
					<h2>The Big Question</h2>
					<p>What would you do here?</p>
				</header>
				<div class="container">
					<div class="row">
						<div class="6u">
							<section class="special">
                <a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a>
							</section>
						</div>
						<div class="6u">
							<section class="special">
                <a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
							</section>
						</div>
						<div class="12u">
							<section class="special">
                <h3>The Goal</h3>
								<p>Our goal is to make use of existing resources by having the imaginative citizens of Baltimore create projects in the vacant lots and underused buildings in their communities. By empowering neighbors to make a change, dreams will be realized and the community will be brought closer together. So Baltimore, look around and ask "What would you do here?"</p>
							</section>
						</div>
					</div>

          </div>

				</div>

			</section>

      <!-- two -->
      <section id= "two" class="wrapper style1">
  				<header class="major">
  					<h2>The Process</h2>
  					<p>How does this all come together?</p>
  				</header>
  					<div class="row">
  						<div class="4u">
  							<section class="special box">
  								<i class="icon 1"><img src="../images/lot.png" /></i>
  								<h3>The Location</h3>
  								<p>Find an empty lot or vacant property. Choose from a location that has already been posted or report a location in your own neighborhood as well!</p>
  							</section>
  						</div>
  						<div class="4u">
  							<section class="special box">
  								<i class="icon 2"><img src="../images/idea.png" /></i>
  								<h3>The Idea</h3>
  								<p>Come up with an idea you would like to see in your community. You can choose to submit it anonymously or login and get credit for your idea.</p>
  							</section>
  						</div>
  						<div class="4u">
  							<section class="special box">
  								<i class="icon 3"><img src="../images/strategy.png" /></i>
  								<h3>The Plan</h3>
  								<p>Once an idea and a location come together, a plan is made. A plan has tasks that need to be done and might need some extra materials as well. </p>
  							</section>
  						</div>
  					</div>
            <div class="row">
  						<div class="4u">
  							<section class="special box">
  								<i class="icon 4"><img src="../images/team.png" /></i>
  								<h3>The Community</h3>
  								<p>Users contribute by volunteering to fill the item requirements of the plan. Users can also donate their time and complete tasks for the project.</p>
  							</section>
  						</div>
  						<div class="4u">
  							<section class="special box">
  								<i class="icon 5"><img src="../images/implementation.png" /></i>
  								<h3>The Project</h3>
  								<p>What was once a waste of space has now been transformed into a location that benefits the community. A successful project can easily be repeated!</p>
  							</section>
  						</div>
              <div class="4u">
  							<section class="special box">
  								<i class="icon 6"><img src="../images/city.png" /></i>
  								<h3>The City</h3>
  								<p>Vacant properties are being used and events are being planned that help revitialize the neighborhoods of the city and bring the community closer.</p>
  							</section>
  						</div>
  					</div>
            <ul class="actions" style="text-align:center;">
              <br>
              <h3>And it all started with you!</h3>
              <br>
              <li><a href="../home" class="button big special">Get Started</a></li>
            </ul>
  				</div>
  			</section>

<!-- Footer -->
	<footer id="footer">
		<div class="container">
			<div class="copyright">
				 &copy; Copyright WWYDH <?php echo date("Y") ?>
			</div>
		</div>
	</footer>

	</body>
</html>
