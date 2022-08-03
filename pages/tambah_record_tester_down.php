<?php
require_once '../config/database.php';

$query = "SELECT * FROM record_tester_down_database";
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
	<title>Tambah Record Tester Down</title>
</head>

<body style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
	<div class="container">
		<div class="row" style="height:100vh;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5%;">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Tambah Record Tester Down</h3>
						<hr>
						<form role="form" action="../process/tambah_record_tester_down.php" method="post">
							<div class="row" style="margin-left:auto; margin-right:auto; padding: 10px;">
								<div class="col-md-6">
                                <div class="form-group row">
										<label class="col-md-3" for="project_code">Project Code</label>
										<div class="col-md-9">
                                        <select name="project_code" class="form-control">
												<option value="WA">WA</option>
												<option value="ES">ES</option>
												<option value="PG">RMA</option>
												<option value="PE">ASR</option>
											</select>                                          
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="pcba_pn">PCBA P/N</label>
										<div class="col-md-9">
                                        <select name="pcba_pn" class="form-control">
												<?php while ($d = mysqli_fetch_array($sql)) { ?>
													<option value="<?= $d['pcba_pn'] ?>"><?= $d['pcba_pn'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="wo">WO#</label>
										<div class="col-md-9">
											<input type="text" name="wo" class="form-control" id="wo" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="request_by">Request By</label>
										<div class="col-md-9">
											<input type="number" name="request_by" class="form-control" id="request_by" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="date_request">Date Request</label>
										<div class="col-md-9">
											<input type="date" name="date_request" class="form-control" id="date_request" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="time_request">Time Request</label>
										<div class="col-md-9">
											<input type="time" name="time_request" class="form-control" id="time_request">
										</div>
                                    </div>
								</div>
								<div class="col-md-5">
									<div class="form-group row">
										<label class="col-md-3" for="setup_by">Setup By</label>
										<div class="col-md-9">
											<select name="setup_by" class="form-control">
												<option value="RAYMOND">RAYMOND</option>
												<option value="FADIL">FADIL</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="date_setup">Date Setup</label>
										<div class="col-md-9">
                                        <input type="date" name="date_setup" class="form-control" id="date_setup">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="time_start">Time Start</label>
										<div class="col-md-9">
											<input type="time" name="time_start" class="form-control" id="time_start" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="failure_desc">Tester Failure Desc.</label>
										<div class="col-md-9">
											<input type="text" name="failure_desc" class="form-control" id="failure_desc" required>
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