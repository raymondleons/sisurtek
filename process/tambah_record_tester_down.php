<?php

require_once '../config/database.php';

if (isset($_POST['selesai'])) {
	$id = uniqid();
	
    $project_code = $_POST['project_code'];
    $pcba_pn = $_POST['pcba_pn'];
	$wo = $_POST['wo'];
	$request_by = $_POST['request_by'];
	$date_request = $_POST['date_request'];
	$time_request = $_POST['time_request'];
	$setup_by = $_POST['setup_by'];
	$date_setup = $_POST['date_setup'];
	$time_start = $_POST['time_start'];
	$failure_desc = $_POST['failure_desc'];
	
	$query = "INSERT INTO record_tester_down VALUES ('$id', '$project_code', '$pcba_pn', '$wo', '$request_by', '$date_request', '$time_request', '$setup_by', '$date_setup', '$time_start', '$failure_desc')";
	echo $query;
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pages/search_record_tester_down.php?msg=success');
	} else {
		echo "gagal input data";
	}
	
}

?>