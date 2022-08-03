<?php
// panggil koneksi ke database
require_once '../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_setup";
$sql = mysqli_query($db, $query);
$counter = 1;
?>

<!DOCTYPE html>
<html>
	<head>
    <?php include 'limit_sesi.php' ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../asset/css/style.css">
		<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
		<title>Update Record Setup</title>
	</head>
	<body>
		<div class="jumbotron text-center" style="background:linear-gradient(40deg, #64B5F6, #8E24AA);color:#ffffff;">
			<h1>Update Record Setup</h1>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="text-center">
						<h3>Update Record Setup</h3><hr>
					</div>
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
										<a href="edit_record_setup.php?id=<?php echo $rs['id']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
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