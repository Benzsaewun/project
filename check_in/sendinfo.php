<?php 

    session_start();

    require "dbconnect.php";

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $sToken = "J4OG28j7NScONbAgE1iLkYOJ91uE6TkO0TeKmIY3j0E";
        $sMessage = "\nรายละเอียดการเช็คอิน\n";
        $sMessage .= "id: " . $id . " \n";
        $sMessage .= "date: " . date("d/m/Y h:i:s") . " \n";
        
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        if ($result) {
            $_SESSION['success'] = "ส่งข้อมูลแจ้งเตือน Line Notify เรียบร้อยแล้ว!";
            header("location: index.php");
        } else {
            $_SESSION['error'] = "ส่งข้อมูลแจ้งเตือนผิดพลาด!";
            header("location: index.php");
        }

        //Result error 
        // if(curl_error($chOne)) 
        // { 
        //     echo 'error:' . curl_error($chOne); 
        // } 
        // else { 
        //     $result_ = json_decode($result, true); 
        //     echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        // } 
        // curl_close( $chOne );   
    }
    
?>