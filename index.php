<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MmS Home Page</title>
    <!-- Updated Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background: #ffffff;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        .card img {
            height: 220px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #343a40;
        }
        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }
        
        /* Custom Button Styles */
        .btn-custom {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            padding: 12px 24px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-custom:hover {
            background: linear-gradient(135deg, #1e7e34, #155724);
            transform: scale(1.08);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <?php include("include/header.php"); ?>

    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <!-- First Card -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="img/info.jpg" alt="Information" class="card-img-top rounded">
                    <div class="card-body text-center">
                        <h5 class="card-title">More Information</h5>
                        <p class="card-text">Click below to get more details.</p>
                        <a href="info.php" class="btn btn-custom">More Info</a>
                    </div>
                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="img/patient.jpg" alt="Patient" class="card-img-top rounded">
                    <div class="card-body text-center">
                        <h5 class="card-title">Create an Account</h5>
                        <p class="card-text">Register now so we can take good care of you.</p>
                        <a href="account.php" class="btn btn-custom">Sign Up</a>
                    </div>
                </div>
            </div>

            <!-- Third Card -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="img/doctor.jpg" alt="Doctor" class="card-img-top rounded">
                    <div class="card-body text-center">
                        <h5 class="card-title">Join Our Team</h5>
                        <p class="card-text">We are hiring skilled doctors. Apply now!</p>
                        <a href="doctorlogin.php" class="btn btn-custom">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
