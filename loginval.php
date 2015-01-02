<?php
session_start();
require_once 'core/connection.php';
$user = $_POST['username'];
$pass = $_POST['pass'];


$execute = mysqli_query($con, "select * from users where username='$user' and password='$pass' limit 1");
if (mysqli_num_rows($execute) != 1) {
	echo "0";
} else {
	echo '1';
}
?>
