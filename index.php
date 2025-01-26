<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MmS Home Page</title>
    <!-- Add Bootstrap CSS link here for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
        include("include/header.php");
    ?>

    <!-- Added margin top with correct inline style -->
    <div style="margin-top: 50px;"></div>

    <div class="container my-4">
        <div class="row justify-content-center">
            <!-- First card -->
            <div class="col-md-3 mx-2 shadow p-3">
                <img src="img/info.jpg" alt="Information" class="img-fluid rounded" style="width: 100%; height: 190px;">
                <h5 class="text-center">Click on the button for more information</h5>
                <div class="text-center">
                    <a href="#">
                        <button class="btn btn-success">More Information</button>
                    </a>
                </div>
            </div>

            <!-- Second card -->
            <div class="col-md-3 mx-2 shadow p-3">
                <img src="img/patient.jpg" alt="Patient" class="img-fluid rounded" style="width: 100%; height: 190px;">
                <h5 class="text-center">Create Account so that we can take good care of you.</h5>
                <div class="text-center">
                    <a href="account.php">
                        <button class="btn btn-success">Create Account!!!</button>
                    </a>
                </div>
            </div>

            <!-- Third card -->
            <div class="col-md-3 mx-2 shadow p-3">
                <img src="img/doctor.jpg" alt="Doctor" class="img-fluid rounded" style="width: 100%; height: 190px;">
                <h5 class="text-center">We are employing for doctors</h5>
                <div class="text-center">
                    <a href="#">
                        <button class="btn btn-success">Apply Now!!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
