
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
		$str = $row['building_address'];
		$cit = $row['city'];
		$addURL = rawurlencode("$str $cit");

  ?>

<!DOCTYPE html>
<html>

    <link href="styles.css" type="text/css" rel="stylesheet" />
		<meta charset="utf-8">
		<head>
			<link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
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
			<br>

			<title><?php echo $row["building_address"] ?></title>
			<style>

      	#street-view {
        	height: 25em;
      	}
    	</style>
    </head>
		<body>
	    <div id="street-view"></div>
			<script>
			var panorama;

  		function loadStreetView() {

    	var _lat = <?php echo $row["latitude"] ?>;
    	var _lng = <?php echo $row["longitude"] ?>;

    	var target = new google.maps.LatLng(_lat,_lng);

    	var sv = new google.maps.StreetViewService();

    	panorama = new google.maps.StreetViewPanorama(document.getElementById('street-view'));

    	var pano = sv.getPanoramaByLocation(target, 50, function(result, status) {

      if (status == google.maps.StreetViewStatus.OK) {

        var heading = google.maps.geometry.spherical.computeHeading(result.location.latLng, target);

        panorama.setPosition(result.location.latLng);
        panorama.setPov({
           heading: heading,
           pitch: 0,
           zoom: 0
         });
        panorama.setVisible(true);
				//panorama.setStreetNamesEnabled(false);
				//panorama.setUserNavigationEnabled(false);

      }
      else {

        console.log("Cannot find a street view for this property.");
        return;
      }

    });
  }

  </script>

	    <script async defer
	         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR77cFxxe06TlBNbAAAgEty48353uubUQ&libraries=geometry&callback=loadStreetView">
	    </script>
			<br>
       <div class="name"><?php echo $row["building_address"] ?></div>
       <div class="info">
          <div class="generalInfo">
						<div class="description">
									<br>
									<!-- <h1>Description </h1> -->
										<p>This section includes a general description about this specific lot and </p>
										<p>will include details provided by the creator of this location's page. </p>
									</br>
								</div>
						<br>
		           	<h1>Lot Information</h1>
          	<ul>
							<li><b>Type: </b><?php echo $row["use"] ?></li>
		          <li><b>City: </b><?php echo $row["city"] ?></li>
							<li><b>Zip Code: </b><?php echo $row["zip_code"] ?></li>
              <li><b>Neighborhood: </b><?php echo $row["neighborhood"] ?></li>
							<li><b>Block: </b><?php echo $row["block"] ?></li>
							<li><b>Lot: </b><?php echo $row["lot"] ?></li>
              <li><b>Police District: </b><?php echo $row["police_district"] ?></li>
							<li><b>Council District: </b><?php echo $row["council_district"] ?></li>
          	</ul>
					</br>
					<br>
						<h1>Owner Information</h1>
						<ul>
							<li><b>Lot Owner: </b><?php echo $row["owner"] ?></li>
							<li><b>Owner Mailing Address: </b> <?php echo $row["mailing_address"] ?></li>
						</ul>
					</br>
					<!-- <div class="specInfo">
						<br>
						<h1>Specific Property Information</h1>
								<ul>
          		</ul>
						</br> -->
            <br>
            	<h1>Coordinates</h1>
            	<ul>
              	<li><b>Longitude: </b><?php echo $row["longitude"] ?></li>
              	<li><b>Latitude: </b><?php echo $row["latitude"] ?></li>
            	</ul>
						</br>
					</div>
						<div style="clear: both;"></div>
          </div>
    </body>
</html>
