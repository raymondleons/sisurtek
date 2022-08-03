<?php
// panggil koneksi ke database
require_once '../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_tester_down";
if (isset($_GET['search'])) {
	$search = $_GET['search_input'];
	$query = "SELECT * FROM record_tester_down WHERE project_code like '%" . $search . "%' OR pcba_pn like '%" . $search . "%' OR wo '%" . $search . "%' OR request_by '%" . $search . "%' OR date_request '%" . $search . "%' OR time_request '%" . $search . "%' OR setup_by '%" . $search . "%' OR date_setup like '%" . $search . "%' OR time_start '%" . $search . "%' OR failure_desc '%" . $search . "%' OR start_setup like '%" . $search . "%' OR finish_setup like '%" . $search . "%' OR start_test like '%" . $search . "%'";
}
$sql = mysqli_query($db, $query);
$counter = 1;
?>



<!DOCTYPE html>
<html>

<head>
<?php include 'limit_sesi.php' ?>
<?php include 'session.php' ?>
<?php include 'level.php' ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Search Record Tester Down</title>
</head>

<body>
	<div class="jumbotron text-center" style="background:linear-gradient(40deg, #64B5F6, #8E24AA);color:#ffffff;">
		<h1>Search Record Tester Down</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="text-center">
					<h3>Search Record Tester Down</h3>
					<hr>
				</div>
				<form action="search_record_tester_down.php">
					<div class="row">
						<div class="col-md-4">
							<div class="input-group">
								<input type="text" name="search_input" class="form-control" placeholder="Search" id="txtSearch" />
								<div class="input-group-btn">
									<button class="btn btn-primary" type="submit" name="search">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<a href="../process/download_record_tester_down.php" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i> Download Excel</a>
						</div>
					</div>
				</form>
				<br>
				<?php if (isset($_GET['msg'])) { ?>
						<?php if ($_GET['msg'] == 'success') { ?>
							<p class="alert alert-success">Berhasil Proses Data</p>
						<?php } ?>
					<?php } ?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Project Code</th>
								<th>PCBA P/N</th>
								<th>WO</th>
								<th>Request By</th>
								<th>Date Request</th>
								<th>Time Request</th>
								<th>Setup By</th>
								<th>Date Setup</th>
								<th>Time Start</th>
								<th>Failure Description</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sql as $rs) : ?>
								<tr>
									<td><?php echo $counter++; ?></td>
									<td><?php echo $rs['project_code']; ?></td>
									<td><?php echo $rs['pcba_pn']; ?></td>
									<td><?php echo $rs['wo']; ?></td>
									<td><?php echo $rs['request_by']; ?></td>
									<td><?php echo $rs['date_request']; ?></td>
									<td><?php echo $rs['time_request']; ?></td>
									<td><?php echo $rs['setup_by']; ?></td>
									<td><?php echo $rs['date_setup']; ?></td>
									<td><?php echo $rs['time_start']; ?></td>
									<td><?php echo $rs['failure_desc']; ?></td>
									<td>
										<a href="../process/hapus_record_tester_down.php?id=<?php echo $rs['id']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<button onclick="location.href='../pages/home.php'" style="background-color: #4CAF50; color: white; border: none; border-radius: 4px; padding: 7px 10px; margin-bottom:10px;">Back to menu</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>