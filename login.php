<!DOCTYPE html>
<html>
	<title>&nbsp;</title>
	<head>
		<title>Revenue Collector</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.4.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="_assets/css/jqm-demos.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> -->
		<script src="js/jquery.js"></script>
		<script src="js/script.js"></script>
		<script src="_assets/js/index.js"></script>
		<script src="js/jquery.mobile-1.4.4.min.js"></script>
	</head>
	<body>
		<!-- Start of first page I -->
		<div data-role="page" id="page1">
			<!-- Header -->
			<div data-role="header" data-position='fixed'>
				<h1>LOGIN</h1>

			</div>
			<!-- /header -->
			<!-- Content    -->
			<div data-role="content">
				<div>
					<div id="display" class="display"></div>
					<!-- <form action="" method="post"> -->
					<label for="username" style="text-align: center">Username</label>
					<input type="text" name="username" value="" id="txtusername" data-mini='true'/>
					<label for="password" style="text-align: center">Password</label>
					<input type="password" name="password" value="" id="txtpassword" data-mini='true'/>
					<button type="submit" name="btnlogin"  data-mini='true' onclick="Login()" style="border-left: 1px solid skyblue; background: #3388cc; text-shadow: none;">
						LOGIN
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
</html>
<script>
	document.addEventListener("deviceready", onDeviceReady, false);

	function onDeviceReady() {
		document.addEventListener("pause", onPause, false);
		document.addEventListener("resume", onResume, false);
		document.addEventListener("offline", onOffline, false);
		// alert("Device is Ready");

	}

	//What to do when paused
	function onPause() {

		alert("paused!");
	}

	//What to do when resumed
	function onResume() {

		alert("resume");
	}

	//What to do when offline
	function onOffline() {

		alert("Your device is currently offline");
	}

	//Login Attempt
	function Login() {
		$("#display").html('Processing...');
		$("#display").show();
		var id = $('#txtusername').val();
		var pass = $('#txtpassword').val();

		if (id == '' || pass == '') {
			$("#display").html('All fields required');
			$("#display").css('color', 'red');
			$("#display").fadeOut(8000);
		} else {

			$.post("loginval.php", {
				username : id,
				pass : pass
			}, function(data) {
				if (data == '1') {
					$("#display").hide();
					window.location = 'main.php';
				} else {
					$("#display").html('Invalid redentials');
					$("#display").css('color', 'red');
					$("#display").fadeIn();
					$("#display").fadeOut(8000);

				};
			});
		}
	}
</script>