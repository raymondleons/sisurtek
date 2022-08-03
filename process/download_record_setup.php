<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Report - Record Setup" . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

// panggil koneksi ke database
require_once '../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_setup";
if (isset($_GET['search'])) {
	$search = $_GET['search_input'];
	$query = "SELECT * FROM record_setup WHERE setup_date like '%" . $search . "%' OR test_type like '%" . $search . "%' OR model like '%" . $search . "%' OR wip_type like '%" . $search . "%' OR wo_no like '%" . $search . "%' OR wo_qty like '%" . $search . "%' OR op_badge like '%" . $search . "%' OR production_sn like '%" . $search . "%' OR test_result like '%" . $search . "%' OR setup_by like '%" . $search . "%' OR start_setup like '%" . $search . "%' OR finish_setup like '%" . $search . "%' OR start_test like '%" . $search . "%'";
}
$sql = mysqli_query($db, $query);
$counter = 1;

$query1 = "SELECT * FROM record_database";
$sql2 = mysqli_query($db, $query1);

$setup = [];
while ($get = mysqli_fetch_array($sql2)) {
	$setup[$get['model']] = $get;
}

?>

<table border="1" style="">
	<thead>
		<tr>
			<th colspan="21">DAILY FPT/ICT/FCT / FQC / On board Programming Setup Record</th>
		</tr>
		<tr>
			<th>No</th>
			<th>SETUP DATE</th>
			<th>MODEL</th>
			<th>WIP TYPE</th>
			<th>WORKORDER #</th>
			<th>WORKORDER QTY</th>
			<th>OPERATOR BADGE ID</th>
			<th>TEST TYPE</th>
			<th>MACHINE TYPE</th>
			<th>FIXTURE ID (TOOLING NUMBER)</th>
			<th>TEST PROGRAM</th>
			<th>TEST PROGRAM REVISION</th>
			<th>REFERENCE [KGB / GOLDEN] BOARD S/N</th>
			<th>REFERENCE [KGB / GOLDEN] BOARD VERIFICATION PASS/FAIL</th>
			<th>1st piece Production board serial number [N.A for no serial number]</th>
			<th>1st piece Production board test Pass / Fail</th>
			<th>SETUP BY</th>
			<th>START SETUP TIME </th>
			<th>FINISH SETUP TIME</th>
			<th>PRODUCTION START TEST TIME</th>
			<th>REMARKS</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($value = mysqli_fetch_array($sql)) :
		?>
			<tr>
				<td><?php echo $counter++; ?></td>
				<td><?php echo $value['setup_date'] ?></td>
				<td><?php echo $value['model'] ?></td>
				<td><?php echo $value['wip_type'] ?></td>
				<td><?php echo $value['wo_no'] ?></td>
				<td><?php echo $value['wo_qty'] ?></td>
				<td><?php echo $value['op_badge'] ?></td>
				<td><?php echo $value['test_type'] ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['machine_type'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['fixture_id'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['test_program_name'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['test_program_revision'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['reference_kgb_sn'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['reference_kgb_verify'] : '' ?></td>
				<td><?php echo $value['production_sn'] ?></td>
				<td><?php echo $value['test_result'] ?></td>
				<td><?php echo $value['setup_by'] ?></td>
				<td><?php echo $value['start_setup'] ?></td>
				<td><?php echo $value['finish_setup'] ?></td>
				<td><?php echo $value['start_test'] ?></td>
				<td></td>
			</tr>
		<?php endwhile;
		?>
	</tbody>
</table>