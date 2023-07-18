<?php

    include_once 'dbconnect.php';

    $sql = '
    SELECT * 
    FROM employee;
    ';

  $objQuery = mysqli_query($con, $sql) or die("Error Query [" . $sql . "]");
?>
  
 <!DOCTYPE html>
 <html>
 <head>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" >
     <title>PHP Admin | Users</title>
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
                <li class=""><a href="#">Login as Admin</a></li>
     			<li class="active"><a href="admin_login.php" style="color: red;">Logout</a></li>
     		</ul>
     	</div>
     </div>
 </nav>

 <div class="container">
     <div class="row">
         <div class="col-xs-8 col-xs-offset-2">
             <legend>Show All Users</legend>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">        
                    <tbody>  
                        <tr>
                            <th>
                                <div align="center">No</div>
                            </th>
                            <th width="100">
                                <div align="center">EmployeeID</div>
                            </th>
                            <th width="100">
                                <div align="center">Title</div>
                            </th>
                            <th width="200px">
                                <div align="center">Name</div>
                            </th>
                            <th width="100">
                                <div align="center">Sex</div>
                            </th>
                            <th width="100">
                                <div align="center">Education</div>
                            </th>
                            <th width="100">
                                <div align="center">Salary</div>
                            </th>
                            <th width="100">
                                <div align="center">DepartmentID</div>
                            </th>
                            <th width="100">
                                <div align="center">Update</div>
                            </th>
                            <th width="100">
                                <div align="center">Delete</div>
                            </th>
                        </tr>
                    </tbody>
                    <?php
                        $i = 1;
                        while ($objResult = mysqli_fetch_array($objQuery)) {
                    ?>

                    <tr>
                        <td><div align="center"><?php echo $i; ?></div></td>
                        <td><?php echo $objResult["EmployeeID"]; ?></td>
                        <td><?php echo $objResult["Title"]; ?></td>
                        <td><?php echo $objResult["Name"]; ?></td>
                        <td><?php echo $objResult["Sex"]; ?></td>
                        <td><?php echo $objResult["Education"]; ?></td>
                        <td><?php echo $objResult["Salary"]; ?></td>
                        <td><?php echo $objResult["DepartmentID"]; ?></td>
                        <td align="center"><a href="update.php?EmployeeID=<?php echo $objResult["EmployeeID"]; ?>"><button type="submit" name="submit" class="btn btn-primary"  ">Update</button></a></td>
                        <td align="center"><a href="deletedata.php?EmployeeID=<?php echo $objResult["EmployeeID"]; ?>" ><button type="submit" name="submit" class="btn btn-danger"  ">Delete</button></a></td>
                    </tr>

                    <?php
                    $i++;
                    }
                    ?>
                </table>
            </div>
         </div>
    </div>
  
<?php mysqli_close($con); ?>

 </body>
 </html>
