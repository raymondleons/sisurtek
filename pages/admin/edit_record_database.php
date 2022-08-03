<?php // panggil koneksi ke database
require_once '../../config/database.php';

$id = $_GET['id'];
$query = "SELECT * FROM record_database WHERE id = '$id'";
$sql = mysqli_query($db, $query);
$rs = mysqli_fetch_assoc($sql);
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
	<title>Edit Record Database</title>
</head>

<body>
	<div class="container-fluid" style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
		<div class="row" style="height:100vh;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5%;">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Edit Record Database</h3>
						<hr>
						<form role="form" action="../../process/edit_record_database_proses.php?id=<?php echo $rs['id'] ?>" method="post">
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label>Test Type</label>
										<div class="radio">
											<label><input type="radio" name="test_type" value="ICT" <?= ($rs['test_type'] == 'ICT') ? 'checked' : '' ?>>ICT</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FPT" <?= ($rs['test_type'] == 'FPT') ? 'checked' : '' ?>>FPT</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FCT" <?= ($rs['test_type'] == 'FCT') ? 'checked' : '' ?>>FCT</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FCT2" <?= ($rs['test_type'] == 'FCT2') ? 'checked' : '' ?>>FCT2</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FQC" <?= ($rs['test_type'] == 'FQC') ? 'checked' : '' ?>>FQC</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="on board programming" <?= ($rs['test_type'] == 'on board programming') ? 'checked' : '' ?>>on board programming</label>
										</div>
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group row">
										<label class="col-md-3" for="model">Model</label>
										<div class="col-md-9">
											<input type="text" name="model" class="form-control" id="model" value="<?= $rs['model'] ?>" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="machine_type">Machine Type</label>
										<div class="col-md-9">
											<input type="text" name="machine_type" class="form-control" id="machine_type" value="<?= $rs['machine_type'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="fixture_id">Fixture ID</label>
										<div class="col-md-9">
											<input type="text" name="fixture_id" class="form-control" id="fixture_id" value="<?= $rs['fixture_id'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="test_program_name">Test Program Name</label>
										<div class="col-md-9">
											<input type="text" name="test_program_name" class="form-control" id="test_program_name" value="<?= $rs['test_program_name'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="test_program_revision">Test Program Revision</label>
										<div class="col-md-9">
											<input type="text" name="test_program_revision" class="form-control" id="test_program_revision" value="<?= $rs['test_program_revision'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="reference_kgb_sn">Reference KGB (SN)</label>
										<div class="col-md-9">
											<input type="text" name="reference_kgb_sn" class="form-control" id="reference_kgb_sn" value="<?= $rs['reference_kgb_sn'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="reference_kgb_verify">Reference KGB Verify</label>
										<div class="col-md-9">
											<input type="text" name="reference_kgb_verify" class="form-control" id="reference_kgb_verify" value="<?= $rs['reference_kgb_verify'] ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
								<a href="../pages/admin/update_record_database.php" class="btn btn-lg btn-danger" style="width:49%;"><span class="glyphicon glyphicon-remove-sign"></span> Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>