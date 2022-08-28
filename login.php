<?php
    session_start();

    include 'conn.php';

    if(isset($_POST['btn'])){
        $username = $_POST['name'];
        $pass = $_POST['pass'];
        $usertype=$_POST['usertype'];

        if(strcmp($usertype,"employee")==0){
            $sql = "select * from employee where user_name='$username' and user_pass='$pass'";

            if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
                $_SESSION['user']=$username;
                $_SESSION['status']="welcome $username";
                header('location:empdash.php');
            }else{
                echo "<script>
                alert('wrong information');
                window.location.href='index.html';
                </script>";
            }

        }else if(strcmp($usertype,"jobseeker")==0){
            $sql = "select * from jobseeker where user_name='$username' and user_pass='$pass'";

            if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
                $_SESSION['user']=$username;
                $_SESSION['status']="welcome $username";
                header('location:jobdash.php');
            }else{
                echo "<script>
                alert('wrong information');
                window.location.href='index.html';
                </script>";
            }

        }else{
            $sql = "select * from admin_credentials where username='$username' and password='$pass'";
        
            if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
                //$_SESSION['msg']="Login Successfully";
                $_SESSION['user']=$username;
                $_SESSION['status']="welcome $username";
                header('location:admindash.php');
                echo "admin";
            }else{
                echo "<script>
                alert('wrong information');
                window.location.href='index.html';
                </script>";
            }
        }

    }

?>