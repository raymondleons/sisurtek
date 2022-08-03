<?php
require_once '../config/database.php';

$query = "SELECT * FROM record_database";
$sql = mysqli_query($db, $query);
$counter = 1;
?>

<!DOCTYPE html>
<html>

<head>
<?php include 'session.php' ?>
<?php include 'level.php' ?>
<?php include 'limit_sesi.php' ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Tambah Record Setup</title>
</head>

<body style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
	<div class="container">
		<div class="row" style="height:100vh;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5%;">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Tambah Record Setup</h3>
						<hr>
						<form role="form" action="../process/tambah_record_setup.php" method="post">
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label>Test Type</label>
										<div class="radio">
											<label><input type="radio" name="test_type" value="ICT" checked>ICT</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FPT">FPT</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FCT">FCT</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FCT2">FCT2</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="FQC">FQC</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="test_type" value="on board programming">OBP</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group row">
										<label class="col-md-3" for="model">Model</label>
										<div class="col-md-9">
											<select name="model" class="form-control">
												<?php while ($d = mysqli_fetch_array($sql)) { ?>
													<option value="<?= $d['model'] ?>"><?= $d['model'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="machine_type">WIP Type</label>
										<div class="col-md-9">
											<select name="wip_type" class="form-control">
												<option value="FRESH">FRESH</option>
												<option value="DEBUG">DEBUG</option>
												<option value="RMA">RMA</option>
												<option value="ASR">ASR</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="wo_no">WO #</label>
										<div class="col-md-9">
											<input type="text" name="wo_no" class="form-control" id="wo_no" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="wo_qty">WO Qty</label>
										<div class="col-md-9">
											<input type="text" name="wo_qty" class="form-control" id="wo_qty" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="op_badge">OP. Badge</label>
										<div class="col-md-9">
											<input type="number" name="op_badge" class="form-control" id="op_badge" required>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group row">
										<label class="col-md-3" for="production_sn">Production S/N</label>
										<div class="col-md-9">
											<input type="text" name="production_sn" class="form-control" id="production_sn">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="test_result">Test Result</label>
										<div class="col-md-9">
											<select name="test_result" class="form-control">
												<option value="PASS">PASS</option>
												<option value="FAIL">FAIL</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="setup_by">Setup By</label>
										<div class="col-md-9">
											<select name="setup_by" class="form-control">
												<option value="RAYMOND">RAYMOND</option>
												<option value="FADHIL">FADHIL</option>
												<option value="NANDA">NANDA</option>
												<option value="YOKIS">YOKIS</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="start_setup">Start Setup</label>
										<div class="col-md-9">
											<input type="time" name="start_setup" class="form-control" id="start_setup" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="finish_setup">Finish Setup</label>
										<div class="col-md-9">
											<input type="time" name="finish_setup" class="form-control" id="finish_setup" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="start_test">Start Test</label>
										<div class="col-md-9">
											<input type="time" name="start_test" class="form-control" id="start_test" required>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="sumbit" name="selesai" class="btn btn-lg btn-success" style="width:49%;"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
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