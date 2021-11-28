<?php 

if (isset($_POST['name']) &&
	isset($_POST['gender'])) {

	include "../db_conn.php";

	$name = $_POST['name'];
	$gender = $_POST['gender'];

	if (empty($name)) {
		header("Location: ../index.php?ms=Name is required");
	    exit;
	}else {
		if (isset($_POST['programmer'])) {
			$programmer = "YES";
		}else {
			$programmer = "NO";
		}
        $sql = "INSERT INTO users(name, gender, programmer)
                VALUES('$name', '$gender', '$programmer')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
        	$ms = "Successfully created";
        	header("Location: ../index.php?ms=$ms");
	        exit;
        }else {
        	$ms = "Unknown error occurred";
        	header("Location: ../index.php?ms=$ms");
	        exit;
        }

	}
}else {
	header("Location: ../index.php");
	exit;
}