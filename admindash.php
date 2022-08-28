<?php
    session_start();
    include 'conn.php';
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
                <div class="row col col-md">
                    
                    <div class="col-md-4">
                        <?php
                        $sql="SELECT * FROM employee";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo'
                        <a href="viewEmp.php">
                            <div class="card-stats">
                                <span class="h4"><i class="fa fa-user pr-3" aria-hidden="true"></i>'.$count.'</span>
                                <div class="large font-weight-bold">Employee</div>
                            </div>
                        </a>';
                        ?>
                    </div>

                    <div class="col-md-4">
                        <?php
                        $sql="SELECT * FROM job ";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo'
                        <a href="adminViewJob.php">
                            <div class="card-stats">
                                <span class="h4"><i class="fa fa-briefcase pr-3" aria-hidden="true"></i>'.$count.'</span>
                                <div class="large font-weight-bold">Job Posted</div>
                            </div>
                        </a>';
                        ?>
                    </div>

                    <div class="col-md-4">
                        <?php
                        $sql="SELECT * FROM jobseeker";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo'
                        <a href="viewJobSeeker.php">
                            <div class="card-stats">
                                <span class="h4"><i class="fa fa-users pr-3" aria-hidden="true"></i>'.$count.'</span>
                                <div class="large font-weight-bold">Job Seeker</div>
                            </div>
                        </a>';
                        ?>
                    </div>



                </div>
            </div>
        </div>
    </section>
</body>
</html>