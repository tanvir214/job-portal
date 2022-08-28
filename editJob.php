<?php

session_start();
 include 'conn.php';
 $jodId = $_GET['jobId'];

 $sql ="SELECT * FROM job WHERE job_id=$jodId";

 $row=mysqli_fetch_assoc(mysqli_query($conn,$sql));

 $empname=$row['employee_user_name'];
 $user=$_SESSION['user'];

 if(isset($_POST['btn'])){
     $jobTitle=$_POST['jobTitle'];
     $jobDes=$_POST['jobDes'];
     $jobReq=$_POST['jobReq'];
     $jobCat=$_POST['jobCat'];
     $jobCity=$_POST['city'];
     $jobType=$_POST['type'];
     $jobEmp=$_SESSION['user'];

     $sql="UPDATE job SET jobtitle='$jobTitle',jobdes='$jobDes',jobreq='$jobReq',jobcity='$jobCity',jobcat='$jobCat',jobtype='$jobType',employee_user_name='$empname' WHERE job_id='$jodId'";

     if(mysqli_query($conn,$sql)){
        $_SESSION['status'] = "Update Successfully";
        if($user=="admin"){
            header('location:admindash.php'); }else{
               header('location:empdash.php');
            }
     }else{
        $msg = "Unknown Error";
     }

 }

 if($user=="admin"){
   $back="admindash";
}else{
   $back="empdash";
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
      <h1>Job Post Form</h1>
      <form action="" method="POST">
         <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="jobTitle" class="form-control" placeholder="Job Title" value="<?php echo $row['jobtitle'] ?>" required>
         </div>
         <div class="form-group">
            <label for="jobDes" required>Job Description</label>
            <textarea class="form-control" name="jobDes" rows="5"  required> <?php echo $row['jobdes'] ?> </textarea>
         </div>
         <div class="form-group">
            <label for="jonReq">Requirements</label>
            <textarea class="form-control" name="jobReq" rows="5" required><?php echo $row['jobreq'] ?></textarea>
         </div>
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="inputCity">City</label>
               <input type="text" name="city" class="form-control" placeholder="Dhaka" value="<?php echo $row['jobcity'] ?>" list="locList" required>
               <datalist id="locList">
               <?php
                 $sql="SELECT * FROM location";
                 $result=mysqli_query($conn,$sql);
                 while($row=mysqli_fetch_assoc($result)){?>
                 <option value="<?php echo $row['city']?>"></option>
                 <?php } ?>
               </datalist>
            </div>
            <div class="form-group col-md-4 d-flex align-items-end">
               <a href="addLocation.php"><button type="button" class="btn btn-outline-primary">Add New Location</button></a>
            </div>
         </div>

         <div class="form-row">
             <div class="form-group col-md-4">
               <label for="type">Category</label>
               <input type="text" name="jobCat" class="form-control"  placeholder="Designs" list="catList" required>
               <datalist id="catList">
               <?php
                 $sql="SELECT * FROM category";
                 $result=mysqli_query($conn,$sql);
                 while($row=mysqli_fetch_assoc($result)){?>
                 <option value="<?php echo $row['category_name']?>" />
                 <?php } ?>
               </datalist>
            </div>
            <div class="form-group col-md-4 d-flex align-items-end">
               <a href="addCategory.php"><button type="button" class="btn btn-outline-primary">Add New Category</button></a>
            </div>
         </div>


         <div class="form-row">
             <div class="from-group mb-4">
                 <label for="inputCity">Type</label>
                 <select class="custom-select" name="type">
                     <option selected value="Full time">Full Time</option>
                     <option value="Part time">Part Time</option>
                     <option value="Freelance">Freelance</option>
                 </select>
             </div>
         </div>

         <div class="form_row d-flex justify-content-between">
            <div class="col-md-4 pl-0">
               <button name="btn" type="submit" class="btn btn-primary">Update Job</button>
            </div>
            <div class="col-md-4">
               <a href="<?php echo $back ?>.php" class="btn btn-primary">Back Home</a>
            </div>
         </div>
      </form>
   </div>
</body>
</html>