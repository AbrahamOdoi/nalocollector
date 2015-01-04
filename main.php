<?php
	session_start();
	$agent=$_SESSION['agent']
?>
<!DOCTYPE html>
<html>
	<head>
		<title>RevenueColletor</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.4.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="_assets/css/jqm-demos.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
		<script src="js/jquery.js"></script>
		<script src="js/script.js"></script>
		<script src="_assets/js/index.js"></script>
		<script src="js/jquery.mobile-1.4.4.min.js"></script>
	</head>
	<body style="background: blue;">

		<div data-role="page" id="pgWelcome">

			<div data-role="header" data-position='fixed' data-theme='a' >
				<a href="login.php" rel="external" data-transition='flow' class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all">No text</a>
				<h1>C-PANEL</h1>
			</div><!-- /header -->

			<div data-role="content" class="ui-content">
				<div>
					<table border="0" cellspacing="30" cellpadding="5" width="100%" height="200px">
						<tr align="left">
							<td><a href="#newClient" data-transition='flip'><i class="fa fa-user fa-4x"></i>
							<br/>
							New Client</a></td>
							<td><a href="#newPayment" data-transition='pop'><i class="fa fa-money fa-4x"></i>
							<br/>
							Payment</a></td>
						</tr>
						<tr>
							<td><i class="fa fa-line-chart fa-4x"></i>
							<br/>
							Report</td>
							<td><i class="fa fa-search fa-4x"></i>
							<br/>
							Search</td>
						</tr>
						<tr>
							<td><i class="fa fa-wrench fa-4x"></i>
							<br/>
							Setting</td>
							<td><i class="fa fa-sign-out fa-4x"></i>
							<br/>
							Signout</td>
						</tr>
					</table>

				</div>
			</div><!-- /content -->

			<div data-role="footer" data-position="fixed" data-theme=''>
				<h1>ZoomLion</h1>
			</div>
			<!-- /footer -->
		</div><!-- /page -->

		<!-- Start of NEW CLIENT page I -->
		<div data-role="page" id="newClient">
			<!-- Header -->
			<div data-role="header" data-position='fixed' data-add-back-btn="true">
				<h1>NEW CIENT</h1>

			</div>
			<!-- /header -->
			<!-- Content    -->
			<div data-role="content">
				<div>
					<div id="display" class="display">
						
					</div>
					<!-- <form action="" method="post"> -->
					<label for="username" style="text-align: center">Client Name</label>
					<input type="text" name="clientName" value="" id="clientName" data-mini='true'  placeholder="Abraham Odoi Nii Laryea"/>
					<label for="password" style="text-align: center">Gender</label>
					<select name="clientGender" id="clientGender" data-mini='true' >
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>

					<label for="mobile" style="text-align: center">Mobile</label>
					<input type="text" name="mobile" value="" id="clientMobile" data-mini='true'  placeholder="233000000000"/>

					<label for="mobile" style="text-align: center">Location</label>
					<input type="text" name="location" value="" id="clientLocation" data-mini='true'  placeholder="46 Pamploshie St. La-Accra"/>

					<label for="clientID" style="text-align: center">Client ID</label>
					<input type="text" name="clientID" style="text-align: center; color: red"  value="<?php echo 'ZL' . rand(100, 100000); ?>" id="clientID" disabled='disabled' />

					<button name="btnnewClient"  data-mini='true' onclick="newClient()" style="border-left: 1px solid skyblue; background: #3388cc; color:white; text-shadow: none;">
						PAY
					</button>
					<!-- </form> -->
				</div>
			</div>
			<!-- /content -->
			<!-- footer -->
			<div data-role="footer" data-position='fixed'>
				<h4>&copy; 2014 NALO</h4>
			</div>
			<!-- /footer -->
		</div>
		<!-- /page -->

		<!-- Start of PAYMENT page I -->
		<div data-role="page" id="newPayment">
			<!-- Header -->
			<div data-role="header" data-position='fixed' data-add-back-btn="true">
				<h1>PAYMENT</h1>

			</div>
			<!-- /header -->
			<!-- Content    -->
			<div data-role="content">
				<div>
					<div id="paydisplay" class="display">
					</div>
					<!-- <form action="" method="post"> -->
					<label for="paymentClient" style="text-align: center">Client ID</label>
					<input type="text" name="paymentClient" onkeyup="fetchuser()" value="" id="paymentClient"  placeholder="ZL0000000"/>

					<label for="mobile" style="text-align: center">Client Name</label>
					<input type="text" name="paymentClientN" value="" disabled='disabled'  id="paymentClientN" data-mini='true'  />

					<label for="paymentType" style="text-align: center">Type</label>
					<select name="paymentType" id="paymentType" data-mini='true' >
						<option value="Cash">Cash</option>
						<option value="Check">Check</option>
						<option value="Mobilemoney">Mobilemoney</option>
					</select>

					<label for="paymentAmount" style="text-align: center">Amount GHs</label>
					<input type="text" name="paymentAmount" value="" id="paymentAmount" data-mini='true'  placeholder="100000"/>

					<label for="receivedOn" style="text-align: center">Received On</label>
					<input type="text" name="receivedOn" value="<?php echo date('Y-m-d H:i:s'); ?>" disabled='disabled' id="receivedOn" data-mini='true'  />

					<label for="receivedBy" style="text-align: center">Received by</label>
					<input type="text" name="receivedBy" value="<?php echo $agent; ?>" disabled='disabled' id="receivedBy" data-mini='true'  />

					<button name="btnnewPayment" id="btnnewPayment"  data-mini='true' onclick="newPayment()" style="border-left: 1px solid skyblue; background: #3388cc; color:white; text-shadow: none;">
						PAY
					</button>
					<!-- </form> -->
				</div>
			</div>
			<!-- /content -->
			<!-- footer -->
			<div data-role="footer" data-position='fixed'>
				<h4>&copy; 2014 NALO</h4>
			</div>
			<!-- /footer -->
		</div>
		<!-- /page -->

<!-- Start of SEARCH page I -->
		<div data-role="page" id="newPayment">
			<!-- Header -->
			<div data-role="header" data-position='fixed' data-add-back-btn="true">
				<h1>CLIENTS</h1>

			</div>
			<!-- /header -->
			<!-- Content    -->
			<div data-role="content">
				<div>
					<div id="searchdisplay" class="display">
						
					</div>
					<!-- <form action="" method="post"> -->
					<label for="paymentClient" style="text-align: center">Client ID</label>
					<input type="text" name="paymentClient" onkeyup="fetchuser()" value="" id="paymentClient"  placeholder="ZL0000000"/>

					<label for="mobile" style="text-align: center">Client Name</label>
					<input type="text" name="paymentClientN" value="" disabled='disabled'  id="paymentClientN" data-mini='true'  />

					<label for="paymentType" style="text-align: center">Type</label>
					<select name="paymentType" id="paymentType" data-mini='true' >
						<option value="Cash">Cash</option>
						<option value="Check">Check</option>
						<option value="Mobilemoney">Mobilemoney</option>
					</select>

					<label for="paymentAmount" style="text-align: center">Amount GHs</label>
					<input type="text" name="paymentAmount" value="" id="paymentAmount" data-mini='true'  placeholder="100000"/>

					<label for="receivedOn" style="text-align: center">Received On</label>
					<input type="text" name="receivedOn" value="<?php echo date('Y-m-d H:i:s'); ?>" disabled='disabled' id="receivedOn" data-mini='true'  />

					<label for="receivedBy" style="text-align: center">Received by</label>
					<input type="text" name="receivedBy" value="<?php echo $agent; ?>" disabled='disabled' id="receivedBy" data-mini='true'  />

					<button name="btnnewPayment" id="btnnewPayment"  data-mini='true' onclick="newPayment()" style="border-left: 1px solid skyblue; background: #3388cc; color:white; text-shadow: none;">
						PAY
					</button>
					<!-- </form> -->
				</div>
			</div>
			<!-- /content -->
			<!-- footer -->
			<div data-role="footer" data-position='fixed'>
				<h4>&copy; 2014 NALO</h4>
			</div>
			<!-- /footer -->
		</div>
		<!-- /page -->

	</body>
	<script>
		//Login Attempt
		function newClient() {
			$("#display").html('Processing...');
			$("#display").show();
			var name = $('#clientName').val();
			var gender = $('#clientGender').val();
			var mobile = $('#clientMobile').val();
			var location = $('#clientLocation').val();
			var id = $('#clientID').val();

			if (name == '' || gender == '' || mobile == '' || location == '') {
				$("#display").html('All fields required');
				$("#display").css('color', 'red');
				$("#display").fadeOut(8000);
			} else {

				$.post("newClient.php", {
					clientName : name,
					clientGender : gender,
					clientLocation : location,
					clientMobile : mobile,
					id : id
				}, function(data) {
					if (data == '1') {
						$("#display").html('Client Added Successfully');

						$('#clientName').val('');
						$('#clientGender').val('');
						$('#clientMobile').val('');
						$('#clientLocation').val('');

						$("#display").fadeIn();
						$("#display").fadeOut(9000);

					} else {
						$("#display").html('Operation Unsuccessful. Try again' + data);
						$("#display").css('color', 'red');
						$("#display").fadeIn();
						$("#display").fadeOut(9000);

					};
				});
			}
			return false;
		}

	</script>
	<script>
		function fetchuser() {
			var clientid = $('#paymentClient').val();
			$.post("fetchclient.php", {
				clientid : clientid,
			}, function(data) {
				$('#paymentClientN').val(data);
			});
		}

	</script>
	<script>
		function newPayment() {
			$("#paydisplay").html('Processing...');
			$("#paydisplay").show();
			var paymentClient = $('#paymentClient').val();
			var paymentClientN = $('#paymentClientN').val();
			var paymentType = $('#paymentType').val();
			var paymentAmount = $('#paymentAmount').val();

			if (paymentClient == '' || paymentType == '' || paymentAmount == '') {
				$("#paydisplay").html('All fields required');
				$("#paydisplay").css('color', 'red');
				$("#paydisplay").fadeOut(8000);
			} else {

				$.post("newPayment.php", {
					paymentClient : paymentClient,
					paymentClientN : paymentClientN,
					paymentType : paymentType,
					paymentAmount : paymentAmount
				}, function(data) {
					if (data == '1') {
						$("#paydisplay").html('Payment Recorded Successfully');

						$('#paymentClient').val('');
						$('#paymentClientN').val('');
						$('#paymentAmount').val('');

						$("#paydisplay").fadeOut(9000);

					} else {
						alert(data);
						$("#paydisplay").html('Operation Unsuccessful. Try again' + data);
						$("#paydisplay").css('color', 'red');
						$("#paydisplay").fadeIn();
						$("#paydisplay").fadeOut(9000);

					};
				});
			}
		}

	</script>
</html>
