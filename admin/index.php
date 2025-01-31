<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* General Page Styling */
body {
    background: #f4f6f9;
    font-family: 'Poppins', sans-serif;
}

/* Dashboard Cards */
.col-md-3 {
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    cursor: pointer;
}

.col-md-3:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

/* Card Text */
.col-md-8 h5 {
    font-weight: bold;
}

/* Admin Card */
.bg-success {
    background: linear-gradient(135deg, #28a745, #218838);
    color: white;
}

/* Doctor Card */
.bg-info {
    background: linear-gradient(135deg, #17a2b8, #138496);
    color: white;
}

/* Patient Card */
.bg-warning {
    background: linear-gradient(135deg, #ffc107, #e0a800);
    color: white;
}

/* Report Card */
.bg-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
}

/* Icon Styling */
i {
    transition: transform 0.3s ease-in-out;
}

.col-md-3:hover i {
    transform: scale(1.2);
}

/* Input Fields */
.form-control {
    border-radius: 30px;
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.form-control:focus {
    box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
    transform: scale(1.02);
}

/* Button */
.btn-success {
    border-radius: 30px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.btn-success:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Animation for Fade-in */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.alert-danger {
    animation: fadeIn 0.5s ease-in-out;
}
/* Admin Dashboard Title */
h4.my-2 {
    font-size: 32px;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    color: #343a40; /* Dark Gray */
    letter-spacing: 1px;
    position: relative;
    padding-bottom: 10px;
    margin-top: 20px;
    animation: fadeInTitle 1s ease-in-out;
}

/* Underline Effect */
h4.my-2::after {
    content: '';
    width: 80px;
    height: 4px;
    background: #28a745; /* Green accent */
    display: block;
    margin: auto;
    margin-top: 5px;
    border-radius: 2px;
    transition: width 0.3s ease-in-out;
}

/* Hover Effect */
h4.my-2:hover::after {
    width: 120px;
}

/* Fade-In Animation */
@keyframes fadeInTitle {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


    </style>
</head>
<body>
    <!-- Include Header -->
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <!-- Main Container -->
    <div class="container-fluid">
        
        <div class="row">
        <div class="col-md-2" style="margin-left: -30px;">
            <?php
                include("sidenav.php");
            ?>
        </div>
        

            <!-- Main Content -->
            <div class="col-md-10">
                <h4 class="my-2">Admin Dashboard</h4>
                <div class="col-md-12 my-5">
                    <div class="row">
                        <!-- Admin Card -->
                        <div class="col-md-3 bg-success mx-2" style="height:130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"> 
                                        <?php
                                            $ad = mysqli_query($connect, "SELECT * FROM admin");
                                            $num = mysqli_num_rows($ad);
                                        ?>
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;">
                                            <?php echo $num; ?>
                                        </h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Admin</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="admin.php">
                                            <i class="fa-solid fa-users-gear fa-3x my-4" style="color:white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Doctor Card -->
                        <div class="col-md-3 bg-info mx-2" style="height:130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"> 
                                        <?php
                                            $doctor = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");
                                            $num2= mysqli_num_rows($doctor);
                                        ?>
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;"><?php echo $num2; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctor</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="doctor.php">
                                            <i class="fa-solid fa-user-doctor fa-3x my-4" style="color:white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Patient Card -->
                        <div class="col-md-3 bg-warning mx-2" style="height:130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"> 
                                    <?php
                                            $p = mysqli_query($connect,"SELECT * FROM patient ");
                                            $pp= mysqli_num_rows($p);
                                    ?>
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;"><?php echo $pp ;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patient</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="patient.php">
                                            <i class="fa-solid fa-bed-pulse fa-3x my-4" style="color:white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Report Card -->
                        <div class="col-md-3 bg-danger mx-2 my-2" style="height:130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"> 
                                    <?php
                                            $re = mysqli_query($connect,"SELECT * FROM report ");
                                            $rep= mysqli_num_rows($re);
                                    ?>
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;"><?php echo $rep ;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Report</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="report.php">
                                            <i class="fa-solid fa-flag fa-3x my-4" style="color:white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job Request Card -->
                        <div class="col-md-3 bg-warning mx-2 my-2" style="height:130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"> 
                                        <?php
                                        $job = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pending'" );
                                        $num1=mysqli_num_rows($job);

                                        ?>
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;"><?php echo $num1 ; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Request</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="job_request.php">
                                            <i class="fa-solid fa-book-open fa-3x my-4" style="color:white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Income Card -->
                        <div class="col-md-3 bg-success mx-2 my-2" style="height:130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8"> 
                                    <?php
                                            $in = mysqli_query($connect,"SELECT SUM(amount_paid	) as profit FROM income ");
                                            $row= mysqli_fetch_array($in);
                                            $inc = $row['profit'];
                                    ?>
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;"><?php echo $inc ;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Income</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="income.php">
                                            <i class="fa-solid fa-money-check-dollar fa-3x my-4" style="color:white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
