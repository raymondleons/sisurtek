<?php
// panggil koneksi ke database
require_once '../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_tester_down";
$sql = mysqli_query($db, $query);
$counter = 1;
?>

<!DOCTYPE html>
<html>
	<head>
    <?php include 'limit_sesi.php' ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
		<title>Update Record Tester Down</title>
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
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
                                    <th>#</th>
                                    <th>Project Code</th>
                                    <th>PCBA P/N</th>
                                    <th>WO</th>
                                    <th>Request By</th>
                                    <th>Date Request</th>
                                    <th>Time Request</th>
                                    <th>Setup By</th>
                                    <th>Date Setup</th>
                                    <th>Time Start</th>
                                    <th>Failure Description</th>
                                    <th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($sql as $rs) : ?>
								<tr>
									<td><?php echo $counter++; ?></td>
									<td><?php echo $rs['project_code']; ?></td>
									<td><?php echo $rs['pcba_pn']; ?></td>
									<td><?php echo $rs['wo']; ?></td>
									<td><?php echo $rs['request_by']; ?></td>
									<td><?php echo $rs['date_request']; ?></td>
									<td><?php echo $rs['time_request']; ?></td>
									<td><?php echo $rs['setup_by']; ?></td>
									<td><?php echo $rs['date_setup']; ?></td>
									<td><?php echo $rs['time_start']; ?></td>
									<td><?php echo $rs['failure_desc']; ?></td>
									<td>
										<a href="edit_record_tester_down.php?id=<?php echo $rs['id']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
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