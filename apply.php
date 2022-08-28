<?php
    session_start();
    include 'conn.php';

    $jobID=$_GET['jobId'];
    $user=$_SESSION['user'];

    $sql="SELECT * FROM job WHERE job_id='$jobID'";
    $row= mysqli_fetch_assoc(mysqli_query($conn,$sql));


    if(isset($_POST['btn'])){
        $name=$_POST['fname'];
        $email=$_POST['email'];
        $cover=$_POST['cover'];

        $filename=$_FILES['cv']['name'];
        $destination='resume/'.$filename;

        $extension=pathinfo($filename,PATHINFO_EXTENSION);
        $file=$_FILES['cv']['tmp_name'];
        $size=$_FILES['cv']['size'];

        if(!in_array($extension,['doc','pdf','docx'])){
            $msg="File must be .doc, .pdf .docx";
        }else if($size>1000000){
            $msg="File too large";
        }else{
            $sql="SELECT * FROM application WHERE jobseeker_user_name='$user' and job_job_id='$jobID'";
            if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
                $msg="Already Applied";
            }else if(move_uploaded_file($file,$destination)){
                $sql="INSERT INTO application (jobseeker_user_name, job_job_id, fullname, email, coverlatter, cv) VALUES ('$user', '$jobID', '$name', '$email', '$cover', '$filename')";
                if(mysqli_query($conn,$sql)){
                   $msg="Applied Successfully";
                }
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
    <title>apply</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php include 'html/header.html' ?>

    <section>
        <div class="container">

            <?php
                    if(isset($msg))
                    { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!!!</strong> <?php echo $msg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    }
                
                ?>
            <div class="row my-5">
                <div class="col-md-6">
                    <div class="font-title font-weight-bold text-dark">
                        <?php echo $row['jobtitle'] ?>
                    </div>
                    <div class="font-job-p text-dark mt-3">
                        <span class="font-job-title font-weight-bold">Job brief</span><br>
                        <?php echo $row['jobdes'] ?>
                    </div>
                    <div class="font-job-p text-dark mt-2">
                        <span class="font-job-title mt-2">Requirements</span><br>
                        <?php echo $row['jobreq'] ?>
                    </div>
                    <div class="font-weight-normal text-dark mt-2">
                        <span class="font-weight-bold mt-2"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>Job Categories:</span>
                        <?php echo $row['jobcat'] ?>
                    </div>
                    <div class="font-weight-normal text-dark mt-2">
                        <span class="font-weight-bold mt-2"><i class="fa fa-briefcase mr-1" aria-hidden="true"></i>Job Type:</span>
                        <?php echo $row['jobtype'] ?>
                    </div>
                    <div class="font-weight-normal text-dark mt-2">
                        <span class="font-weight-bold mt-2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i>Job Location:</span>
                        <?php echo $row['jobcity'] ?>
                    </div>
                </div>
                <div class="col-md-5 ml-2 mt-5">
                    <div class="row mt-2">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h1 class="card-title fs-4 fw-bold mb-2 pt-2 text-center">Apply for this job</h1>
                                <p class="card-body fs-4 fw-bold mb-3 text-center">Use the form below to submit your job application</p>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
										<label for="name" class="mb-2">Full Name</label>
										<input type="text" name="fname" placeholder="John Alone" class="form-control" required autofocus>
									</div>
                                    <div class="mb-3">
										<label for="name" class="mb-2">Email</label>
										<input type="text" name="email" placeholder="John.Alone@yahoo.com" class="form-control" required>
									</div>
                                    <div class="mb-3">
										<label for="name" class="mb-2">Cover Latter</label>
										<input type="text" name="cover" placeholder="John Alone" class="form-control" required>
									</div>
                                    <div class="form-group mt-3">
                                        <label class="mr-2">Upload your CV:</label>
                                        <input type="file" name="cv" required>
                                    </div>
                                    <button type="submit" name="btn" class="btn btn-primary apply-btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mb-5">
            <a href="jobdash.php"><i class="fa fa-long-arrow-left mr-2" aria-hidden="true"></i>Back to listings</a>
        </div>
    </section>

</body>
</html>