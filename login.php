<?php
   include('config/config.php');
   session_start();

	$error = '';
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$stmt = $db->prepare("SELECT id, passord, brukernavn FROM brukere WHERE brukernavn = ?");
		$stmt->bindParam(1, $username);

		if(!$stmt->execute()) {
			$error = "Database error.";
		} else {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		if(password_verify($password, $row["passord"])) {
			$_SESSION['user_id'] = $row["id"];
			$_SESSION['brukernavn'] = $row["brukernavn"];
			//header("Location: https://<ditt domene>/index.php");
			header("Location: http://dataelektronikk.dk-media.no/index.php");
		} else {
			$error = "Invalid credentials. This incident has been reported.";
			$stmt = $db->prepare("INSERT INTO accesslog (brukernavn, ip) VALUES (?, ?)");
			$clean_ip = $_SERVER['REMOTE_ADDR'];

			$stmt->bindParam(1, $username);
      $stmt->bindParam(2, $clean_ip);
			$stmt->execute();
		}
	}

	function strip_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tittel</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="dist/css/login.css">
</head>
<body>
	<div class="text-center">
	</div>
	<div id="myModal" class="modal fade">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<i class="fa fa-user"></i>
							<input type="text" class="form-control" name="username" placeholder="Brukernavn" required="required">
						</div>
						<div class="form-group">
							<i class="fa fa-lock"></i>
							<input type="password" class="form-control" name="password" placeholder="Passord" required="required">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
						</div>
					</form>

				</div>
				<div class="modal-footer">
					<?php
						if($error == '') {
							echo "Unauthorized access attempts will be reported.";
						} else {
							echo "<div style=\"color:#cc0000;\">" . $error . "</div>";
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
</html>
