<?php

    session_start();
    include 'conn.php';

    if(isset($_GET['apId'])){
        $id=$_GET['apId'];

        $sql = "SELECT * FROM application WHERE jobseeker_user_name='$id'";

        $result = mysqli_query($conn,$sql);

        $file = mysqli_fetch_assoc($result);


        $filepath='resume/'.$file['cv'];

        if(file_exists($filepath)){
            header('Content-Type: application/octet-stream');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename='. basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate'); 
            header('Pragma:public');
            header('Content-Lenght:'.filesize('resume/'.$file['cv']));

            readfile('resume/'.$file['cv']);
            
        }
    }
?>