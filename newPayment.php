<?php
session_start();
include_once 'core/connection.php';

$paymentClient = $_POST['paymentClient'];
$paymentClientN = $_POST['paymentClientN'];
$paymentType = $_POST['paymentType'];
$paymentAmount = $_POST['paymentAmount'];
$receivedBy = $_SESSION['agent'];

$result_verify = mysqli_query($con, "select * from clients where clientid='$paymentClient' and name='$paymentClientN'");
if (mysqli_num_rows($result_verify) > 0) {
	$result_payment = mysqli_query($con, "insert into payments (client,clientname,type,amount,receivedby)values('$paymentClient','$paymentClientN','$paymentType','$paymentAmount','$receivedBy');");
	if ($result_payment) {
		echo "1";
	} else {
		echo "0" . mysqli_error($con);
	}
} else {
	echo "Invalid ClientID";
}
?>