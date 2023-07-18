<!DOCTYPE html>
 <html>
 <head>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" >
     <title>PHP Admin | Update</title>
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

    <?php
    $update_ID    = $_REQUEST['EmployeeID'];
    $EmployeeID   = $update_ID;
    ?>

    

<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <legend>Show All Users</legend>
            <form action="updatedata.php?EmployeeID=<?php echo $EmployeeID; ?>" method="post" name="Employee">
                <table class="table table-bordered table-hover">        
                    <tr>
                        <td>EmployeeID : </td>
                        <td><input type="text" name="EmployeeID" value="<?php echo $EmployeeID; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Title : </td>
                        <td><select name="Title">
                                <option value=นาย>นาย</option>
                                <option value=นางสาว>นางสาว</option>
                                <option value=นาง>นาง</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Name : </td>
                        <td><input type="text" name="Name"></td>
                    </tr>
                    <tr>
                        <td>Sex : </td>
                        <td>
                            <input type="radio" name="Sex" value="ชาย"> ชาย
                            <input type="radio" name="Sex" value="หญิง"> หญิง
                        </td>
                    </tr>
                    <tr>
                        <td>Education : </td>
                        <td><select name="Education">
                                <option value=ปริญญาตรี>ปริญญาตรี</option>
                                <option value=ปริญญาโท>ปริญญาโท</option>
                                <option value=อื่นๆ>อื่นๆ</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Start_Date : </td>
                        <td><input type="date" name="Start_Date"></td>
                    </tr>
                    <tr>
                        <td>Salary : </td>
                        <td><input type="text" name="Salary"></td>
                    </tr>
                    <tr>
                        <td>DepartmentID : </td>

                        <?php

                        require('dbconnect.php');
                        $sql = '
                        SELECT DepartmentID 
                        FROM department;
                        ';

                        $objQuery = mysqli_query($con, $sql) or die("Error Query [" . $sql . "]");
                        ?>

                            <td><select name="DepartmentID">
                                <?php
                                while ($objResult = mysqli_fetch_array($objQuery)) {
                                ?>
                                    <option value=<?php echo $objResult["DepartmentID"]; ?>><?php echo $objResult["DepartmentID"]; ?></option>
                                <?php
                                }
                                ?>
                                </select>
                            </td>
                    </tr>
                    
                    
                </table>
                <center><button type="submit" name="submit" class="btn btn-primary" value="Update Data">Update Data</button></center>

                    <?php
                    mysqli_close($con);
                    ?>

            </form>
        </div>
    </div>
</div>

</body>
</html>