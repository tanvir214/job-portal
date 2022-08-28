<?php
    
    session_start();
    include 'conn.php';

    $userId=$_GET['userId'];
    $table=$_GET['tableName'];

    $sql = "DELETE FROM $table WHERE user_name='$userId'";

    if(mysqli_query($conn,$sql)){
        $_SESSION['status']="Delete Successfully";
        header('location:admindash.php');
    }else{
        echo mysqli_error($conn);
    }


?>