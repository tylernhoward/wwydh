<?php
    header("Content-type: text/plain");

    session_start();

    // check if data was submitted
    if (isset($_POST["submit"])) {
        require_once "../conn.php";

        // check login, return login error
        if ((!isset($_SESSION["user"])) && $_POST["leader"] == "true") {
            echo "-1";
            exit();
        }
		$title = $_POST["title"];
		$location = $_POST["location"];
		$idea = $_POST["idea"];
		$creator = $_SESSION["user"]["id"];
		$published = 0;
		$date = $_POST["date"];
		$q = $conn->prepare("INSERT INTO plans (title, location_id, idea_id, creator_id, published, date) VALUES (?, ?, ?, ?, ?, ?)");
		$q->bind_param("sssiis", $title, $location, $idea, $creator, $published, $date);
        $q->execute();

        $id = $conn->insert_id;

        $permits = explode("[-]", $_POST["permits"]);
        $tasks = explode("[-]", $_POST["tasks"]);

        foreach ($permits as $p) {
            $q = $conn->prepare("INSERT INTO Permit (Description, PlanID) VALUES (?, ?)");
            $q->bind_param("si", $p, $id);
            $q->execute();
        }

        foreach ($tasks as $t) {
            $q = $conn->prepare("INSERT INTO PlanTasks (PlanID, Task) VALUES (?, ?)");
            $q->bind_param("is", $id, $t);
            $q->execute();
        }

        echo "1"; // return success
        exit();
    } else {
        echo "Access Denied";
    }
?>
