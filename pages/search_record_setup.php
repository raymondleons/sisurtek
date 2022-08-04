<?php
// panggil koneksi ke database
require_once '../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_setup";
if (isset($_GET['search'])) {
	$search = $_GET['search_input'];
	$query = "SELECT * FROM record_setup WHERE setup_date like '%" . $search . "%' OR test_type like '%" . $search . "%' OR model like '%" . $search . "%' OR wip_type like '%" . $search . "%' OR wo_no like '%" . $search . "%' OR wo_qty like '%" . $search . "%' OR op_badge like '%" . $search . "%' OR production_sn like '%" . $search . "%' OR test_result like '%" . $search . "%' OR setup_by like '%" . $search . "%' OR start_setup like '%" . $search . "%' OR finish_setup like '%" . $search . "%' OR start_test like '%" . $search . "%'";
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
	<link rel="stylesheet" href="../asset/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Search Record Setup</title>
</head>

<body>
	<div class="jumbotron text-center" style="background:linear-gradient(40deg, #64B5F6, #8E24AA);color:#ffffff;">
		<h1>Search Record Setup</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="text-center">
					<h3>Search Record Setup</h3>
					<hr>
				</div>
				<form action="search_record_setup.php">
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
							<a href="../process/download_record_setup.php" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i> Download Excel</a>
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
								<th>Setup Date</th>
								<th>Model</th>
								<th>WIP Type</th>
								<th>WO #</th>
								<th>WO Qty</th>
								<th>Operator Badge ID</th>
								<th>Test Type</th>
								<th>Setup By</th>
								<th>Start Setup</th>
								<th>Finish Setup</th>
								<th>Start Test</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sql as $rs) : ?>
								<tr>
									<td><?php echo $counter++; ?></td>
									<td><?php echo $rs['setup_date']; ?></td>
									<td><?php echo $rs['model']; ?></td>
									<td><?php echo $rs['wip_type']; ?></td>
									<td><?php echo $rs['wo_no']; ?></td>
									<td><?php echo $rs['wo_qty']; ?></td>
									<td><?php echo $rs['op_badge']; ?></td>
									<td><?php echo $rs['test_type']; ?></td>
									<td><?php echo $rs['setup_by']; ?></td>
									<td><?php echo $rs['start_setup']; ?></td>
									<td><?php echo $rs['finish_setup']; ?></td>
									<td><?php echo $rs['start_test']; ?></td>
									<td>
										<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal">Hapus</button>
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
	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Apakah kamu yakin untuk menghapus?</p>
      </div>
      <div class="modal-footer">
        <button onclick="location.href='../process/hapus_record_setup.php?id=<?php echo $rs['id']; ?>'" type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
		<button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
      </div>
    </div>

  </div>
</div>

</body>

</html>