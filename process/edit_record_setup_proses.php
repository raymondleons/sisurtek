<?php // proses edit member

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['selesai'])) { // di submit atau tidak ?
	
	// ambil data dari edit_member.php
	$id = $_GET['id'];
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
	
	// perbarui data di database
	$query = "UPDATE record_setup SET setup_date = '$setup_date', test_type = '$test_type', model = '$model', wip_type = '$wip_type', wo_no = '$wo_no', wo_qty = '$wo_qty', op_badge = '$op_badge', production_sn = '$production_sn', test_result = '$test_result', setup_by = '$setup_by', start_setup = '$start_setup', finish_setup = '$finish_setup', start_test = '$start_test' WHERE id = '$id'";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pages/update_record_setup.php?msg=success');
	} else {
		echo "update data gagal";
	}
}

?>