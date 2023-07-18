<?php
		//7.check admin username and password, set admin name as "admin" and password as "pass1234"
		session_start();
		
		include_once "dbconnect.php";

		//check if form is submited
		if(isset($_POST['login'])) {
			$admin_name = mysqli_real_escape_string($con, $_POST['admin_name']);
			$admin_passwd =mysqli_real_escape_string($con, $_POST['password']);
		
			if($admin_name == "root" && $admin_passwd == "1234") {
				$_SESSION['uname'] = "admin";
				header("Location: show_user.php");
			}
			else {
				$err_msg ="Incorrect admin name or password";
			}
		}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Home</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="admin_login.php">Admin</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>

					<div class="form-group">
						<label for="name">Admin Name</label>
						<input type="text" name="admin_name" placeholder="Admin Name" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-success" />
					</div>
				</fieldset>
			</form>
			<!--8.display message -->
			<span class = "text-danger">
				<?php 
					if(isset($err_msg)) 
					echo $err_msg; 
				?>
			</span>

		</div>
	</div>
</div>
</body>
</html>