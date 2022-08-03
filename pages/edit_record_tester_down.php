<?php // panggil koneksi ke database
require_once '../config/database.php';

$id = $_GET['id'];
$query = "SELECT * FROM record_tester_down WHERE id = '$id'";
$sql = mysqli_query($db, $query);
$rs = mysqli_fetch_assoc($sql);

$query1 = "SELECT * FROM record_tester_down";
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
	<title>Edit Record Tester Down</title>
</head>

<body>
	<div class="container-fluid" style="background:linear-gradient(40deg, #90CAF9, #673AB7);">
		<div class="row" style="height:100vh;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5%;">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Edit Record Tester Down</h3>
						<hr>
						<form role="form" action="../process/edit_record_tester_down.php?id=<?php echo $rs['id'] ?>" method="post">
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label>Project Code</label>
										<div class="radio">
											<label><input type="radio" name="project_code" value="WA" <?= ($rs['project_code'] == 'WA') ? 'checked' : '' ?>>WA</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="project_code" value="ES" <?= ($rs['project_code'] == 'ES') ? 'checked' : '' ?>>ES</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="project_code" value="EW" <?= ($rs['project_code'] == 'EW') ? 'checked' : '' ?>>EW</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="project_code" value="PG" <?= ($rs['project_code'] == 'PG') ? 'checked' : '' ?>>PG</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="project_code" value="PE" <?= ($rs['project_code'] == 'PE') ? 'checked' : '' ?>>PE</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="project_code" value="PU" <?= ($rs['project_code'] == 'PU') ? 'checked' : '' ?>>PU</label>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group row">
										<label class="col-md-3" for="pcba_pn">PCBA PN</label>
										<div class="col-md-9">
											<select name="pcba_pn" class="form-control">
												<?php while ($d = mysqli_fetch_array($sql)) { ?>
													<option value="<?= $d['pcba_pn'] ?>" <?= ($d['pcba_pn'] == $rs['pcba_pn']) ? 'selected' : '' ?>><?= $d['pcba_pn'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="wip_type">WO #</label>
										<div class="col-md-9">
                                        <input type="text" name="wo" class="form-control" id="wo" value="<?= $rs['wo'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="request_by">Request By</label>
										<div class="col-md-9">
											<input type="text" name="request_by" class="form-control" id="request_by" value="<?= $rs['request_by'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="date_request">Date Request</label>
										<div class="col-md-9">
											<input type="text" name="date_request" class="form-control" id="date_request" value="<?= $rs['date_request'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="time_request">Time Request</label>
										<div class="col-md-9">
											<input type="text" name="time_request" class="form-control" id="time_request" value="<?= $rs['time_request'] ?>">
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group row">
										<label class="col-md-3" for="setup_by">Setup By</label>
										<div class="col-md-9">
											<input type="text" name="setup_by" class="form-control" id="setup_by" value="<?= $rs['setup_by'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="date_setup">Date Setup</label>
										<div class="col-md-9">
                                        <input type="text" name="date_setup" class="form-control" id="date_setup" value="<?= $rs['date_setup'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="time_start">Time Start</label>
										<div class="col-md-9">
                                        <input type="text" name="time_start" class="form-control" id="time_start" value="<?= $rs['time_start'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3" for="failure_desc">Failure Desc</label>
										<div class="col-md-9">
											<input type="text" name="failure_desc" class="form-control" id="failure_desc" value="<?= $rs['failure_desc'] ?>">
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