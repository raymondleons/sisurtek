<?php // proses hapus member

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	// hapus data dari database
	$query = "DELETE FROM record_database WHERE id = '$id'";
	$sql = mysqli_query($db, $query);
	
	if ($sql) {
		header('location: ../pages/admin/search_record_database.php?msg=success');
	} else {
		echo "gagal hapus data";
	}
	
}

?>