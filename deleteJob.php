<?php
    session_start();

    include 'conn.php';

    $jobID = $_GET['jobId'];
    $user=$_SESSION['user'];

    $sql ="DELETE FROM job WHERE job_id='$jobID'";


    if(mysqli_query($conn,$sql)){
        $_SESSION['status']="Job Removed Successfully";
        
        if($user=="admin"){
            header('location:admindash.php');
        }else{
            header('location:empdash.php');
        }
    }else{
        $_SESSION['status']="Something Is Wrong";
    }
?>