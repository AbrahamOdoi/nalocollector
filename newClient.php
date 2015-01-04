<?php
session_start();
include_once 'core/connection.php';

$clientName = $_POST['clientName'];
$clientGender = $_POST['clientGender'];
$clientLocation = $_POST['clientLocation'];
$clientMobile = $_POST['clientMobile'];
$clientId = $_POST['id'];
$createdBy = $_SESSION['agent'];

$result_verify = mysqli_query($con, "select * from clients where clientid='$clientId';");
if (mysqli_num_rows($result_verify) > 0) {
	$clientId = $clientId . 'a';

	$result_newclient = mysqli_query($con, "insert into clients (name,gender,mobile,clientid,location,createdby)values('$clientName','$clientGender','$clientMobile','$clientId','$clientLocation','$createdBy');");
	if ($result_newclient) {
		echo "1";
	} else {
		echo "0" . mysqli_error($con);
	}

} else {
	$result_newclient = mysqli_query($con, "insert into clients (name,gender,mobile,clientid,location,createdby)values('$clientName','$clientGender','$clientMobile','$clientId','$clientLocation','$createdBy');");
	if ($result_newclient) {
		echo "1";
	} else {
		echo "0" . mysqli_error($con);
	}
}
?>