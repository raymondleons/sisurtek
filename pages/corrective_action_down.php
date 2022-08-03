<?php
require_once '../config/database.php';

$query = "SELECT * FROM record_tester_down";
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
	<title>Corrective Action Down</title>
</head>

<body style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
	<div class="container">
		<div class="row" style="height:100vh;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5%;">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Corrective Action Down</h3>
						<hr>
						<form role="form" action="../process/corrective_action_down.php" method="post">
							<div class="row">
								<div class="col-md-6">
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
										<label class="col-md-3" for="failure_desc">Failure Description</label>
										<div class="col-md-9">
                                            <input type="text" name="failure_desc" class="form-control" id="failure_desc" value="<?= $rs['failure_desc'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="troubleshooting_findings">Troubelshooting Findings</label>
										<div class="col-md-9">
											<input type="text" name="troubleshooting_findings" class="form-control" id="troubleshooting_findings" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="corrective_action_done">Corrective Actione Done</label>
										<div class="col-md-9">
											<input type="text" name="corrective_action_done" class="form-control" id="corrective_action_done" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="date_downtime_end">Date Downtime End</label>
										<div class="col-md-9">
											<input type="date" name="date_downtime_end" class="form-control" id="date_downtime_end" required>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-md-3" for="downtime_duration">Downtime Duration</label>
										<div class="col-md-9">
											<input type="text" name="downtime_duration" class="form-control" id="downtime_duration" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="status">Status</label>
										<div class="col-md-9">
											<select name="status" class="form-control">
												<option value="OPEN">OPEN</option>
												<option value="CLOSE">CLOSE</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="repair_by">Repair By</label>
										<div class="col-md-9">
											<input type="text" name="repair_by" class="form-control" id="repair_by">
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