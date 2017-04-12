<?php
include("../helpers/conn.php");
$selected_project_id = $_GET['id'];
$q = "SELECT json FROM task_test WHERE test_id= '$selected_project_id'";
$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$json = $row["json"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>All Projects</title>

	</head>
	<body>
		<script>
				// This function creates a details view table with column 1 as the header and column 2 as the details
				// Parameter Information
				// objArray = Anytype of object array, like JSON results
				// theme (optional) = A css class to add to the table (e.g. <table class="<theme>">
				// enableHeader (optional) = Controls if you want to hide/show, default is show
				function CreateDetailView(objArray, theme, enableHeader) {
					// set optional theme parameter
					if (theme === undefined) {
						theme = 'lightPro';  //default theme
					}

					if (enableHeader === undefined) {
						enableHeader = false; //default enable headers
					}

					// If the returned data is an object do nothing, else try to parse
					var array = typeof objArray != 'object' ? JSON.parse(objArray) : new Array(objArray);
					var keys = Object.keys(array[0]);

					var str = '<table class="w3-table-all w3-card-4">';
					str += '<tbody>';


					for (var i = 0; i < array.length; i++) {
						var row = 0;
						for (var index in keys) {
							var objValue = array[i][keys[index]]

							str += (row % 2 == 0) ? '<tr class="w3-green">' : '<tr>';

							if (enableHeader) {
								str += '<th scope="row">' + keys[index] + '</th>';
							}

							// Support for Nested Tables
							if (typeof objValue === 'object' && objValue !== null) {
								if (Array.isArray(objValue)) {
									str += '<td>';
									for (var aindex in objValue) {
										str += CreateDetailView(objValue[aindex], theme, true);
									}
									str += '</td>';
								} else {
									str += '<td>' + CreateDetailView(objValue, theme, true) + '</td>';
								}
							} else {
								if(objValue == "B"){
									objValue = "New Tasks"
								}
								else if(objValue == "C"){
									objValue = "Completed"
								}
								else if(objValue == "W"){
									objValue = "Work in Progress"
								}
								else if(objValue == "A"){
									objValue = "Assigned"
								}
								str += '<td>' + objValue + '</td>';
							}

							str += '</tr>';
							row++;
						}
					}
					str += '</tbody>'
					str += '</table>';
					return str;
				}

				var json = <?php print $json; ?>;
				document.write(CreateDetailView(json));
		</script>
	</body>
</html>
