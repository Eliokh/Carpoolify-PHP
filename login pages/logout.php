<?php
//ob_start();
session_start();
//$_SESSION = array(); 
session_destroy();
header('Location:login.html');
?>



<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<script>
		function confirmLogout() {
			var confirmed = confirm("Are you sure you want to log out?");
			if (confirmed) {
				window.location.href = "login.php";
			}
		}
	</script>
</head>
<body>
	<button onclick="confirmLogout()">Log Out</button>
</body>
</html>
