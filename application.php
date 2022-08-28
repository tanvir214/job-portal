<?php
    session_start();

    include 'conn.php';

    $user=$_SESSION['user'];

    $jobId=$_GET['jobId'];
    $sql="SELECT * FROM application WHERE job_job_id='$jobId'";
    $result=mysqli_query($conn,$sql);

    if($user=="admin"){
        $back="adminViewJob";
    }else{
        $back="viewJob";
    }
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
                                    <td scope="col" class="font-weight-bold text-center">Name</td>
                                    <td scope="col" class="font-weight-bold text-center">Email</td>
                                    <td scope="col" class="font-weight-bold text-center">Cover Latter</td>
                                    <td scope="col" class="font-weight-bold text-center">CV</td>
                                    <td scope="col" class="font-weight-bold text-center">Download</td>                                   
                                </tr>
                            </thead>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $name = $row['fullname'];
                                        $email = $row['email'];
                                        $coverlatter = $row['coverlatter'];
                                        $cv = $row['cv'];
                                        $applicant=$row['jobseeker_user_name']
                            ?>
                                    <tr>
                                        <td class="fw-normal"><?php echo $name ?></td>
                                        <td class="fw-normal"><?php echo $email ?></td>
                                        <td class="fw-normal"><?php echo $coverlatter ?></td>
                                        <td class="fw-normal"><?php echo $cv ?></td>
                                        <td>
                                            <a href=download.php?apId=<?php echo $applicant ?> class="btn btn-outline-primary m-1"><i class="fa fa-download" aria-hidden="true"></i></a>
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
                    <a href="<?php echo $back ?>.php" class="btn btn-primary">Back Home</a>
                </div>
            </div>
        </section>
    
</body>
</html>