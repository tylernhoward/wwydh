
	<?php
		include "../helpers/conn.php";
		$planquery = "SELECT * FROM plans WHERE `id`='{$_GET["id"]}'";
		$allplans = $conn->query($planquery);
  ?>

<!DOCTYPE html>
<html>

    <link href="infostyle.css" type="text/css" rel="stylesheet" />

    <head>
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
