<?php


if(!isset($_SESSION['id'])){
    echo "<script>alert('Anda Belum Login'); window.location = '../../index.php'</script>";
}

//cek level user
if($_SESSION['level']!="Admin"){
	echo "<script>window.location = '../../index.php'</script>";
}

?>