<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'koneksi.php' ?>
<!-- <?php include 'session.php' ?> -->
<?php include 'level.php' ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.min.css">
    <title>Homepage - Admin</title>
</head>

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
					<div class="card">
						<div class="card-body text-center">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">
									<a href="tambah_record_database.php">Create Record Database</a>
								</li>
								<li class="list-group-item list-group-item-warning">
									<a href="update_record_database.php">Update Record Database</a>
								</li>
								<li class="list-group-item list-group-item-success">
									<a href="search_record_database.php">Search Record Database</a>
								</li>
								<li class="list-group-item list-group-item-success">
									<a href="search_record_database.php">Tambah Model Tester</a>
								</li>
							</ul>
						</div>
					</div>
					<button onclick="location.href='logout.php'" style="background-color: red; color: white; border: none; border-radius: 4px; padding: 7px 10px; margin-bottom:10px;">Logout</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>