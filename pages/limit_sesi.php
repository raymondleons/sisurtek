<?php
	$timeout = 5; // setting timeout dalam menit
	$logout = "admin/logout.php"; // redirect halaman logout

	$timeout = $timeout * 60; // menit ke detik
	if(isset($_SESSION['start_session'])){
		$elapsed_time = time()-$_SESSION['start_session'];
		if($elapsed_time >= $timeout){
			session_destroy();
			echo "<script type='text/javascript'>window.location='$logout'</script>";
		}
	}

	$_SESSION['start_session']=time();

?>