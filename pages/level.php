<?php


if(!isset($_SESSION['id'])){
    echo "<script>alert('Anda Belum Login'); window.location = 'index.php'</script>";
}

//cek level user
if($_SESSION['level']!="User"){
	echo "<script>window.location = 'index.php'</script>";
}

?>