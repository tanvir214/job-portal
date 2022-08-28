<?php
    include 'conn.php';

    if(isset($_POST['city'])){
        $city= $_POST['city'];
        $country= $_POST['country'];

        $sql="SELECT * FROM location WHERE city='$city'";

        if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
            $msg="Already Exist";
        }else{
            $sql="INSERT INTO location(city, country) VALUES ('$city','$country')";
            if(mysqli_query($conn,$sql)){
                $msg="Location Added Successfully";
            }
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
         <h1>Add New Location</h1>

            <?php
                    if(isset($msg))
                    { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!!!</strong> <?php echo $msg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    unset($msg);
                    }
                
            ?>


         <form action="" method="POST">
            <div class="form-group">
               <label for="title">City Name</label>
               <input type="text" name="city" class="form-control" placeholder="Dhaka" required>
            </div>

            <div class="form-group">
               <label for="title">Country</label>
               <input type="text" name="country" class="form-control">
            </div>

            <div class="form_row d-flex justify-content-between">
               <div class="col-md-4 pl-0">
                  <button name="btn" type="submit" class="btn btn-primary">Save</button>
               </div>
               <div class="col-md-4">
                  <a href="empdash.php" class="btn btn-primary">Back Home</a>
               </div>
            </div>
         </form>
      </div>
   </body>
</html>