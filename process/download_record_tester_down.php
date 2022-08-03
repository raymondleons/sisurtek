<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Report - Record Tester Down" . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

// panggil koneksi ke database
require_once '../config/database.php';

// ambil data dari database
$query = "SELECT * FROM record_tester_down";
if (isset($_GET['search'])) {
	$search = $_GET['search_input'];
	$query = "SELECT * FROM record_setup WHERE setup_date like '%" . $search . "%' OR test_type like '%" . $search . "%' OR model like '%" . $search . "%' OR wip_type like '%" . $search . "%' OR wo_no like '%" . $search . "%' OR wo_qty like '%" . $search . "%' OR op_badge like '%" . $search . "%' OR production_sn like '%" . $search . "%' OR test_result like '%" . $search . "%' OR setup_by like '%" . $search . "%' OR start_setup like '%" . $search . "%' OR finish_setup like '%" . $search . "%' OR start_test like '%" . $search . "%'";
}
$sql = mysqli_query($db, $query);
$counter = 1;

$query1 = "SELECT * FROM record_tester_down_database";
$sql2 = mysqli_query($db, $query1);

$setup = [];
while ($get = mysqli_fetch_array($sql2)) {
	$setup[$get['pcba_pn']] = $get;
}

?>
<table border="1" style="">
	<thead>
		<tr>
			<th colspan="21">FCT TESTER AND FIXTURE TROUBLESHOOTING RECORD 2021-2022</th>
		</tr>
		<tr>
			<th>No</th>
			<th>PROJECT CODE</th>
			<th>FCT TESTER / FIXTURE TOOLING NO.</th>
			<th>PCBA P/N.</th>
			<th>MODEL DESCRIPTION</th>
			<th>WORKORDER</th>
			<th>REQUEST BY (Name / ID)</th>
			<th>DATE REQUEST</th>
			<th>TIME REQUEST</th>
			<th>SETUP BY (NAME/ID)</th>
			<th>DATE SETUP</th>
			<th>TIME START (AM/PM)</th>
			<th>FAILURE DESCRIPTION TESTER</th>
			<th>TROUBLESHOOTING FINDINGS</th>
			<th>CORRECTIVE ACTION DONE</th>
			<th>DATE DOWNTIME END</th>
			<th>DOWNTIME DURATION</th>
			<th>Status (Close / Open)</th>
			<th>REPAIRED BY</th>
			<th>REMARKS</th>
		</tr>
	</thead>
	<tbody>
		<?php while ($value = mysqli_fetch_array($sql)) :
		?>
			<tr>
				<td><?php echo $counter++; ?></td>
				<td><?php echo $value['project_code'] ?></td>
				<td><?php echo isset($setup[$value['pcba_pn']]) ? $setup[$value['pcba_pn']]['fixture_tooling_no'] : '' ?></td>
				<td><?php echo $value['pcba_pn'] ?></td>
				<td><?php echo isset($setup[$value['pcba_pn']]) ? $setup[$value['pcba_pn']]['model_desc'] : '' ?></td>
				<td><?php echo $value['wo'] ?></td>
				<td><?php echo $value['request_by'] ?></td>
				<td><?php echo $value['date_request'] ?></td>
				<td><?php echo $value['time_request'] ?></td>
				<td><?php echo $value['setup_by'] ?></td>
				<td><?php echo $value['date_setup'] ?></td>
				<td><?php echo $value['time_start'] ?></td>
				<td><?php echo $value['failure_desc'] ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['troubleshooting_findings'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['corrective_action_done'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['date_downtime_end'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['downtime_duration'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['status'] : '' ?></td>
				<td><?php echo isset($setup[$value['model']]) ? $setup[$value['model']]['repair_by'] : '' ?></td>
			</tr>
		<?php endwhile;
		?>
	</tbody>
</table>