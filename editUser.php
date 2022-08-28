<?php
    session_start();
    include 'conn.php';

    $userId=$_GET['userId'];
    $table=$_GET['tableName'];

    $sql="SELECT * FROM $table WHERE user_name='$userId'";

    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql)); 

    if(isset($_POST['btn'])){
        $uname=$_POST['user_name'];
        $upass=$_POST['user_pass'];
        $fname=$_POST['fname'];
        $address=$_POST['address'];
        $phn=$_POST['phn'];
        $email=$_POST['email'];

        $sql="UPDATE $table SET user_name='$uname',user_pass='$upass',fullname='$fname',address='$address',phn='$phn',email='$email' WHERE user_name='$userId'";

        if(mysqli_query($conn,$sql)){
            header('location:admindash.php');
            $_SESSION['status']="Information update successfull";
        }else{
            $_SESSION['status']="Unknown Error";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   <div class="col-md-6 offset-md-3 mt-5 pb-5">
      <h1>Update User Information</h1>
      <form action="" method="POST">
         <div class="form-group">
            <label for="title">User Name</label>
            <input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name'] ?>" required>
         </div>

         <div class="form-group">
            <label for="title">User Password</label>
            <input type="text" name="user_pass" class="form-control" value="<?php echo $row['user_pass'] ?>" required>
         </div>

         <div class="form-group">
            <label for="title">Full Name</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row['fullname'] ?>" required>
         </div>

         <div class="form-group">
            <label for="title">Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ?>" required>
         </div>

         <div class="form-group">
            <label for="title">Phone Number</label>
            <input type="text" name="phn" class="form-control" value="<?php echo $row['phn'] ?>" required>
         </div>

         <div class="form-group">
            <label for="title">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" required>
         </div>

         <div class="form_row d-flex justify-content-between">
            <div class="col-md-4 pl-0">
               <button name="btn" type="submit" class="btn btn-primary">Update</button>
            </div>
            <div class="col-md-4">
               <a href="admindash.php" class="btn btn-primary">Back Home</a>
            </div>
         </div>
      </form>
   </div>
</body>
</html>