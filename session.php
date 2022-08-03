<?php include ('pages/admin/koneksi.php');
 session_start(); 
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<script>
window.location = "index.php";
</script>
<?php 
}
$session_id=$_SESSION['id'];

// $user_query = mysqli_query("select * from users where id = '$session_id'")or die(mysql_error());
// $user_row = mysqli_fetch_array($user_query);


?>