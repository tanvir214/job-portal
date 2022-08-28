<?php
    session_start();
    include 'conn.php';

    $sql="SELECT * FROM job";
    $result=mysqli_query($conn,$sql);

    if(isset($_POST['search'])){
        $svalue=$_POST['svalue'];
        $sql="SELECT * FROM job WHERE CONCAT(jobtitle) LIKE '%$svalue%'";
        $result=mysqli_query($conn,$sql);

    }else{
        $sql="SELECT * FROM job";
        $result=mysqli_query($conn,$sql);
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

    <?php include'html/header.html'; ?>

    <section>
        <div class="container mt-5">
            <div class="col-md-5">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="svalue">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" name="search" >Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section>
       <div class="container mt-4">
       <div class="row">
            <div class="col-md-8">
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
            </div>
        </div>
       </div>
    </section>

    <section>
        <div class="container mt-2">
            <div class="row">
                <div class="row col col-md-12">
                    <?php
                    while($row=mysqli_fetch_assoc($result))
                    {

                        $jobTitle = $row['jobtitle'];
                        $jobLoc = $row['jobcity'];
                        $jobId = $row['job_id'];

                        ?>
                        <div class="col-md-4">
                            <a href="apply.php?jobId=<?php echo $jobId?>">
                                <div class="card-stats">
                                <span class="h4 font-weight-bold text-dark"><?php echo $jobTitle ?></i></span>
                                    <div class="font-weight-normal text-dark"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i><?php echo $jobLoc ?></div>
                                    <div class="font-weight-small">More Details<i class="fa fa-long-arrow-right ml-1" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div> 
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
</body>
</html>