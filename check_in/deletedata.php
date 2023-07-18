<?php

    $delete_ID  = $_REQUEST['EmployeeID'];

    require('dbconnect.php');

    $sql = '
        DELETE FROM employee
        WHERE EmployeeID = ' . $delete_ID . ';
        ';

    $objQuery = mysqli_query($con, $sql);
    if ($objQuery) {
        echo "Record " . $delete_ID . " was Deleted.";
    } else {
        echo "Error : Delete";
    }

    mysqli_close($con); 

?>
