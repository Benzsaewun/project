<?php

    $server = "localhost";
    $username = "root";
    $password ="benz1234";
    $dbname ="dbemp";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed" . mysqli_connect_error());
    }
        
?>