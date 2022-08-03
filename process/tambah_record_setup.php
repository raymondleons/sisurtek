<?php

require_once '../config/database.php';

if (isset($_POST['selesai'])) {
	$id = uniqid();
	
	$setup_date = date('Y-m-d');
	$test_type = $_POST['test_type'];
	$model = $_POST['model'];
	$wip_type = $_POST['wip_type'];
	$wo_no = $_POST['wo_no'];
	$wo_qty = $_POST['wo_qty'];
	$op_badge = $_POST['op_badge'];
	$production_sn = $_POST['production_sn'];
	$test_result = $_POST['test_result'];
	$setup_by = $_POST['setup_by'];
	$start_setup = $_POST['start_setup'];
	$finish_setup = $_POST['finish_setup'];
	$start_test = $_POST['start_test'];
	
	$query = "INSERT INTO record_setup VALUES ('$id', '$setup_date', '$test_type', '$model', '$wip_type', '$wo_no', '$wo_qty', '$op_badge', '$production_sn', '$test_result', '$setup_by', '$start_setup', '$finish_setup', '$start_test')";
	echo $query;
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pages/search_record_setup.php?msg=success');
	} else {
		echo "gagal input data";
	}
	
}

?>