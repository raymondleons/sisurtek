<?php

require_once '../config/database.php';

if (isset($_POST['selesai'])) {
	$id = uniqid();
	
	$model = $_POST['model'];
	$machine_type = $_POST['machine_type'];
	$fixture_id = $_POST['fixture_id'];
	$test_program_name = $_POST['test_program_name'];
	$test_program_revision = $_POST['test_program_revision'];
	$reference_kgb_sn = $_POST['reference_kgb_sn'];
	$reference_kgb_verify = $_POST['reference_kgb_verify'];
	$test_type = $_POST['test_type'];
	
	$query = "INSERT INTO record_database VALUES ('$id', '$model', '$machine_type', '$fixture_id', '$test_program_name', '$test_program_revision', '$reference_kgb_sn', '$reference_kgb_verify', '$test_type')";
	echo $query;
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pages/admin/tambah_record_database.php?msg=success');
	} else {
		echo "gagal input data";
	}
	
}

?>