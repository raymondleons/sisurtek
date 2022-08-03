<!DOCTYPE html>
<html>
<head>
<?php include '../pages/admin/koneksi.php' ?>
<?php include 'session.php' ?>
<?php include 'level.php' ?>
<?php include 'limit_sesi.php' ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
	<title>Homepage - Test Engineering</title>
</head>

<body>
	<div class="jumbotron text-center" style="background:linear-gradient(40deg, #64B5F6, #8E24AA);color:#ffffff;">
		<h1>SystemRecord T-Eng</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="text-center">
					<h3>HOME NAVIGATION</h3>
					<hr>
				</div>
				<div class="container">
					<?php if (isset($_GET['msg'])) { ?>
						<?php if ($_GET['msg'] == 'success') { ?>
							<p class="alert alert-success">Berhasil Proses Data</p>
						<?php } ?>
					<?php } ?>
					<div class="card">
						<div class="card-body text-center">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">
									<a href="tambah_record_setup.php">Create Record Setup</a>
								</li>
								<li class="list-group-item list-group-item-warning">
									<a href="update_record_setup.php">Update Record Setup</a>
								</li>
								<li class="list-group-item list-group-item-success">
									<a href="search_record_setup.php">Search Record Setup</a>
								</li>
							</ul>
                            <hr>
                            <ul class="list-group">
								<li class="list-group-item list-group-item-info">
									<a href="tambah_record_tester_down.php">Create Record Tester Down</a>
								</li>
								<li class="list-group-item list-group-item-warning">
									<a href="update_record_tester_down.php">Update Record Tester Down</a>
								</li>
								<li class="list-group-item list-group-item-success">
									<a href="search_record_tester_down.php">Search Record Tester Down</a>
								</li>
								<li class="list-group-item list-group-item-success">
									<a href="corrective_action_down.php">Corrective Action Down</a>
								</li>
							</ul>
						</div>
					</div>
					<button onclick="location.href='admin/logout.php'" style="background-color: red; color: white; border: none; border-radius: 4px; padding: 7px 10px; margin-bottom:10px;">Logout</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>