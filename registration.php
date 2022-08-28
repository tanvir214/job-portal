<?php
    
    session_start();

    include 'conn.php';

    if(isset($_POST['btn'])){
        $username = $_POST['name'];
        $pass = $_POST['pass'];
        $fname=$_POST['fname'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $phn=$_POST['phone'];
        $usertype=$_POST['usertype'];



        if(strcmp($usertype,"employee")==0){
            $sql = "select * from employee where user_name='$username'";

            if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
                echo "<script>
                        alert('username exist');
                        window.location.href='registration.html';
                        </script>";
            }else{
                $sql= "INSERT INTO employee (user_name, user_pass, fullname, address, phn, email) VALUES ('$username', '$pass', '$fname', '$address', '$phn', '$email')";
                if(mysqli_query($conn,$sql)){
                    $_SESSION['user']=$username;
                    $_SESSION['status']="Account create successfully";
                    header('location:empdash.php');
                    echo "okk";
                }
            }


        }else if(strcmp($usertype,"jobseeker")==0){
            $sql = "select * from jobseeker where user_name='$username'";

            if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
                echo "<script>
                        alert('username exist');
                        window.location.href='registration.html';
                        </script>";
            }else{
                $sql= "INSERT INTO jobseeker (user_name, user_pass, fullname, address, phn, email) VALUES ('$username', '$pass', '$fname', '$address', '$phn', '$email')";
                if(mysqli_query($conn,$sql)){
                    $_SESSION['user']=$username;
                    $_SESSION['status']="Account create successfully";
                    header('location:jobdash.php');
                    echo "okk";
                }
            }
        }

    }
?>