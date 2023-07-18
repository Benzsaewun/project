<?php

  require('dbconnect.php');
  $sql = '
  SELECT Name 
  FROM employee;
  ';

  $objQuery = mysqli_query($con, $sql) or die("Error Query [" . $sql . "]");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Notify</title>
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
  <center>
    <strong><h1 style="color: orange;">ระบบเช็คอิน</h1></strong><hr>
  </center>
    
    <form action="sendinfo.php" method="post">

      <?php 
        if (isset($_SESSION['success'])) {
      ?>    
          <div class="alert alert-success" role="alert">
            <?php 
              echo $_SESSION['success'];
              unset($_SESSION['success']);
            ?>
          </div>
      <?php } ?>

      <?php 
        if (isset($_SESSION['error'])) {
      ?>    
          <div class="alert alert-danger" role="alert">
            <?php 
              echo $_SESSION['error'];
              unset($_SESSION['error']);
            ?>
          </div>
      <?php } ?>

          <div class="mb-3">
          <center>
              <img src="https://img.freepik.com/free-vector/colleagues-working-together-project_74855-6308.jpg?w=1060&t=st=1689636441~exp=1689637041~hmac=9ea48d48d37dfcb6f96f932910bd83d27210775b7634a3e206de5a3c33eb5c40" alt="" height="300"><br>
              <label for="id" class="form-label">Employee Id</label>
              <input type="number" name="id" class="form-control" aria-describedby="emailHelp" style="width: 50%;" placeholder="Employee Id" required><br>
              <center><button type="submit" name="submit" class="btn btn-primary"  ">Check In</button><br><br>
              </center>
              
              <p>or</p>
              <hr>
              
          </div><br>  
    </form>

    <!-- form2 -->
    <form action="sendinfo.php" method="post">

    <?php 
      if (isset($_SESSION['success'])) {
    ?>    
        <div class="alert alert-success" role="alert">
          <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        </div>
    <?php } ?>

    <?php 
      if (isset($_SESSION['error'])) {
    ?>    
        <div class="alert alert-danger" role="alert">
          <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          ?>
        </div>
    <?php } ?>

        <div class="mb-3">
        <center>
            <label for="id" class="form-label">Employee Name</label>
        

            <td name="name">
              <select name="name" class="form-control" aria-describedby="emailHelp" style="width: 200px;">
                <?php
                  while ($objResult = mysqli_fetch_array($objQuery)) {
                ?>
                <option value=<?php echo $objResult["Name"]; ?>><?php echo $objResult["Name"]; ?></option>
                  <?php
                    }
                  ?>
              </select>
            </td><br>

            <button type="submit" name="submit" class="btn btn-primary"  ">Check In</button><br><br>
            <p style="color: green;">ระบบเช็คอินผ่าน <a href="https://notify-bot.line.me/th/" target="_blank" rel="noopener noreferrer" style="color: green; "> LINE Notify</a></p>
        </center>
            
        </div><br>
    </form><br><br>
</div>

</body>
</html>