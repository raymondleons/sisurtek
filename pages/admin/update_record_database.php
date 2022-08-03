<?php
// panggil koneksi ke database
require_once '../../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_database";
$sql = mysqli_query($db, $query);
$counter = 1;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.min.css">
		<title>Update Record Database</title>
	</head>
	<body>
		<div class="jumbotron text-center" style="background:linear-gradient(40deg, #64B5F6, #8E24AA);color:#ffffff;">
			<h1>Update Record Database</h1>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="text-center">
						<h3>Update Record Database</h3><hr>
					</div>
                    <?php if (isset($_GET['msg'])) { ?>
						<?php if ($_GET['msg'] == 'success') { ?>
							<p class="alert alert-success">Data Berhasil Diubah</p>
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
										<a href="edit_record_database.php?id=<?php echo $rs['id']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
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