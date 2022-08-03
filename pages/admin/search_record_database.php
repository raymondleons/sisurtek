<?php
// panggil koneksi ke database
require_once '../../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_database";
if (isset($_GET['search'])) {
	$search = $_GET['search_input'];
	$query = "SELECT * FROM record_database WHERE model like '%" . $search . "%' OR machine_type like '%" . $search . "%' OR fixture_id like '%" . $search . "%' OR test_program_name like '%" . $search . "%' OR test_program_revision like '%" . $search . "%' OR reference_kgb_sn like '%" . $search . "%' OR reference_kgb_verify like '%" . $search . "%' OR test_type like '%" . $search . "%'";
}
$sql = mysqli_query($db, $query);
$counter = 1;
?>

<!DOCTYPE html>
<html>

<head>
<?php include 'koneksi.php' ?>
<!-- <?php include 'session.php' ?> -->
<?php include 'level.php' ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.min.css">
	<title>Search Record Database</title>
</head>

<body>
	<div class="jumbotron text-center" style="background:linear-gradient(40deg, #64B5F6, #8E24AA);color:#ffffff;">
		<h1>Search Record Database</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="text-center">
					<h3>Search Record Database</h3>
					<hr>
				</div>
				<form action="search_record_database.php">
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
					</div>
				</form>
				<br>
				<?php if (isset($_GET['msg'])) { ?>
						<?php if ($_GET['msg'] == 'success') { ?>
							<p class="alert alert-success">Data Berhasil Diproses</p>
						<?php } ?>
					<?php } ?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Model</th>
								<th>Machine Type</th>
								<th>Fixture ID</th>
								<th>Test Program Name</th>
								<th>Test Program Revision</th>
								<th>Reference KGB (SN)</th>
								<th>Reference KGB Verify</th>
								<th>Test Type</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sql as $rs) : ?>
								<tr>
									<td><?php echo $counter++; ?></td>
									<td><?php echo $rs['model']; ?></td>
									<td><?php echo $rs['machine_type']; ?></td>
									<td><?php echo $rs['fixture_id']; ?></td>
									<td><?php echo $rs['test_program_name']; ?></td>
									<td><?php echo $rs['test_program_revision']; ?></td>
									<td><?php echo $rs['reference_kgb_sn']; ?></td>
									<td><?php echo $rs['reference_kgb_verify']; ?></td>
									<td><?php echo $rs['test_type']; ?></td>
									<td>
										<a href="../../process/hapus_record_database.php?id=<?php echo $rs['id']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<button onclick="location.href='../admin/index.php'" style="background-color: #4CAF50; color: white; border: none; border-radius: 4px; padding: 7px 10px; margin-bottom:10px;">Back to menu</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>