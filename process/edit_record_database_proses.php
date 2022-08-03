<?php // proses edit member

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['selesai'])) { // di submit atau tidak ?
	
	// ambil data dari edit_member.php
	$id = $_GET['id'];
	$model = $_POST['model'];
	$machine_type = $_POST['machine_type'];
	$fixture_id = $_POST['fixture_id'];
	$test_program_name = $_POST['test_program_name'];
	$test_program_revision = $_POST['test_program_revision'];
	$reference_kgb_sn = $_POST['reference_kgb_sn'];
	$reference_kgb_verify = $_POST['reference_kgb_verify'];
	$test_type = $_POST['test_type'];
	
	// perbarui data di database
	$query = "UPDATE record_database SET model = '$model', machine_type = '$machine_type', fixture_id = '$fixture_id', test_program_name = '$test_program_name', test_program_revision = '$test_program_revision', reference_kgb_sn = '$reference_kgb_sn', reference_kgb_verify = '$reference_kgb_verify', test_type = '$test_type' WHERE id = '$id'";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pages/admin/update_record_database.php?msg=success');
	} else {
		echo "update data gagal";
	}
}

?>