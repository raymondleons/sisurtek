<?php // panggil koneksi ke database
require_once '../config/database.php';

$id = $_GET['id'];
$query = "SELECT * FROM record_setup WHERE id = '$id'";
$sql = mysqli_query($db, $query);
$rs = mysqli_fetch_assoc($sql);

$query1 = "SELECT * FROM record_setup";
$sql = mysqli_query($db, $query1);
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
	<title>Edit Record Setup</title>
</head>

<body>
	<div class="container-fluid" style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
		<div class="row" style="height:100vh;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5%;">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Edit Record Setup</h3>
						<hr>
						<form role="form" action="../process/edit_record_setup_proses.php?id=<?php echo $rs['id'] ?>" method="post">
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
								<div class="col-md-5">
									<div class="form-group row">
										<label class="col-md-3" for="model">Model</label>
										<div class="col-md-9">
											<select name="model" class="form-control">
												<?php while ($d = mysqli_fetch_array($sql)) { ?>
													<option value="<?= $d['model'] ?>" <?= ($d['model'] == $rs['model']) ? 'selected' : '' ?>><?= $d['model'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="wip_type">WIP Type</label>
										<div class="col-md-9">
											<select name="wip_type" class="form-control">
												<option value="FRESH" <?= ($rs['wip_type'] == 'FRESH') ? 'selected' : '' ?>>FRESH</option>
												<option value="DEBUG" <?= ($rs['wip_type'] == 'DEBUG') ? 'selected' : '' ?>>DEBUG</option>
												<option value="RMA" <?= ($rs['wip_type'] == 'RMA') ? 'selected' : '' ?>>RMA</option>
												<option value="ASR" <?= ($rs['wip_type'] == 'ASR') ? 'selected' : '' ?>>ASR</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="wo_no">WO #</label>
										<div class="col-md-9">
											<input type="text" name="wo_no" class="form-control" id="wo_no" value="<?= $rs['wo_no'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="wo_qty">WO Qty</label>
										<div class="col-md-9">
											<input type="text" name="wo_qty" class="form-control" id="wo_qty" value="<?= $rs['wo_qty'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="op_badge">OP. Badge</label>
										<div class="col-md-9">
											<input type="number" name="op_badge" class="form-control" id="op_badge" value="<?= $rs['op_badge'] ?>">
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group row">
										<label class="col-md-3" for="production_sn">Production S/N</label>
										<div class="col-md-9">
											<input type="text" name="production_sn" class="form-control" id="production_sn" value="<?= $rs['production_sn'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="test_result">Test Result</label>
										<div class="col-md-9">
											<select name="test_result" class="form-control">
												<option value="PASS" <?= ($rs['test_result'] == 'PASS') ? 'selected' : '' ?>>PASS</option>
												<option value="FAIL" <?= ($rs['test_result'] == 'FAIL') ? 'selected' : '' ?>>FAIL</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="setup_by">Setup By</label>
										<div class="col-md-9">
                                        <select name="setup_by" class="form-control">
												<option value="RAYMOND" <?= ($rs['setup_by'] == 'RAYMOND') ? 'selected' : '' ?>>RAYMOND</option>
												<option value="FADHIL" <?= ($rs['setup_by'] == 'FADHIL') ? 'selected' : '' ?>>FADHIL</option>
                                                <option value="NANDA" <?= ($rs['setup_by'] == 'NANDA') ? 'selected' : '' ?>>NANDA</option>
												<option value="YOKIS" <?= ($rs['setup_by'] == 'YOKIS') ? 'selected' : '' ?>>YOKIS</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="start_setup">Start Setup</label>
										<div class="col-md-9">
											<input type="time" name="start_setup" class="form-control" id="start_setup" value="<?= $rs['start_setup'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="finish_setup">Finish Setup</label>
										<div class="col-md-9">
											<input type="time" name="finish_setup" class="form-control" id="finish_setup" value="<?= $rs['finish_setup'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="start_test">Start Test</label>
										<div class="col-md-9">
											<input type="time" name="start_test" class="form-control" id="start_test" value="<?= $rs['start_test'] ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-circle"></span> Selesai</button>
								<a href="../pages/home.php" class="btn btn-lg btn-danger" style="width:49%;"><span class="glyphicon glyphicon-remove-sign"></span> Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>