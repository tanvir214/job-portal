<?php 
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jobportal";
    
    $conn = mysqli_connect($servername,$username,$password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    mysqli_select_db($conn,$dbname);

?>