<?php
    session_start();

    include 'conn.php';

    $user=$_SESSION['user'];
    $sql="SELECT * FROM job WHERE employee_user_name='$user'";
    $result=mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>View Records</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php include'html/header.html';?>

        <div class="container">

        <?php
                    if(isset($_SESSION['status']))
                    { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!!!</strong> <?php echo $_SESSION['status'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    unset($_SESSION['status']);
                    }
                
                ?>


            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td scope="col" class="font-weight-bold text-center">Job Title</td>
                                    <td scope="col" class="font-weight-bold text-center">Job Description</td>
                                    <td scope="col" class="font-weight-bold text-center">Job Location</td>
                                    <td scope="col" class="font-weight-bold text-center">Job Category</td>
                                    <td scope="col" class="font-weight-bold text-center">Job Type</td>
                                    <td scope="col" class="font-weight-bold text-center">Action</td>                                    
                                </tr>
                            </thead>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $jobTitle = $row['jobtitle'];
                                        $jobDes = $row['jobdes'];
                                        $jobLoc = $row['jobcity'];
                                        $jobCat = $row['jobcat'];
                                        $jobType = $row['jobtype'];
                                        $jobId = $row['job_id'];
                            ?>
                                    <tr>
                                        <td class="fw-normal"><?php echo $jobTitle ?></td>
                                        <td class="fw-normal"><?php echo $jobDes ?></td>
                                        <td class="fw-normal"><?php echo $jobLoc ?></td>
                                        <td class="fw-normal"><?php echo $jobCat ?></td>
                                        <td class="fw-normal"><?php echo $jobType ?></td>
                                        <td>
                                            <a href="editJob.php?jobId=<?php echo $jobId; ?>" class="btn btn-outline-primary m-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="deleteJob.php?jobId=<?php echo $jobId; ?>" class="btn btn-outline-danger m-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <a href="application.php?jobId=<?php echo $jobId; ?>" class="btn btn-outline-danger m-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="container">
                <div class="col-md-4 mt-3">
                    <a href="empdash.php" class="btn btn-primary">Back Home</a>
                </div>
            </div>
        </section>
    
</body>
</html>