<?php // proses hapus member

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	// hapus data dari database
	$query = "DELETE FROM record_tester_down WHERE id = '$id'";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pages/search_record_tester_down.php?msg=success');
	} else {
		echo "gagal hapus data";
	}
	
}

?>