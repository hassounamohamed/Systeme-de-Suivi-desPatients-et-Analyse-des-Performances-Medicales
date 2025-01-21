<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        <?php
            include("sidenav.php");
        ?>

            <!-- Main Content -->
            <div class="col-md-10">
                <h4 class="my-2">Admin Dashboard</h4>
                <div class="col-md-12 my-1">
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
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctor</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
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
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patient</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
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
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Report</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
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
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Request</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
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
                                        <h5 class="my-2 text-white text-center" style="font-size:30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Income</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
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
