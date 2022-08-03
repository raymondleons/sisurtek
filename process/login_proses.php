<?php // proses tambah member

// panggil koneksi ke database
require_once '../config/database.php';

if (isset($_POST['submit'])) { // di submit atau tidak ?
	
	// ambil data dari tambah_member.php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// masukkan data ke database
	$query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
	$sql = mysqli_query($db, $query);

    if(mysqli_num_rows($sql) == 0){
    echo "<script>alert('Username / Password salah!')</script>";
    echo '<script type="text/javascript">window.location="../index.php"</script>';

   }else{

    session_start();

    $row = mysqli_fetch_assoc($sql);
	
    $_SESSION['id']	= $row['id'];
    $_SESSION['level']      = $row['level'];

	if($row['level'] == 'Admin'){
		echo '<script type="text/javascript">window.location="../pages/admin/index.php"</script>';
		}
	elseif($row['level'] == 'User'){
		echo '<script type="text/javascript">window.location="../pages/home.php"</script>';
   }
}
}

?>