<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMS Home Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS for Better Design & Animation -->
    <style>
        /* Navbar Custom Styles */
        .navbar {
            background: linear-gradient(135deg, #17a2b8, #117a8b);
            padding: 15px 20px;
            transition: all 0.4s ease-in-out;
        }

        .navbar h5 {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1.1rem;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #dff9fb !important;
            transform: translateY(-3px);
        }

        /* Add subtle glow effect on hover */
        .navbar-nav .nav-link::after {
            content: "";
            display: block;
            width: 0%;
            height: 3px;
            background: #dff9fb;
            transition: width 0.4s ease-in-out;
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /* Responsive Navbar */
        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Button Animation */
        .btn-logout {
            background-color: #ff4d4d;
            color: white;
            border-radius: 20px;
            padding: 8px 15px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-logout:hover {
            background-color: #ff3333;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <h5 class="text-white">Medical Management System</h5>
            
            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php
                        if(isset($_SESSION['admin'])){
                            $user = $_SESSION['admin'];
                            echo '
                                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fa fa-user"></i> '.$user.'</a></li>
                                <li class="nav-item"><a href="logout.php" class="nav-link btn btn-logout">Logout</a></li>
                            ';
                        } else if(isset($_SESSION['doctor'])){
                            $user = $_SESSION['doctor'];
                            echo '
                                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fa fa-user-md"></i> '.$user.'</a></li>
                                <li class="nav-item"><a href="logout.php" class="nav-link btn btn-logout">Logout</a></li>
                            ';
                        } else if(isset($_SESSION['patient'])){
                            $user = $_SESSION['patient'];
                            echo '
                                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fa fa-hospital-user"></i> '.$user.'</a></li>
                                <li class="nav-item"><a href="logout.php" class="nav-link btn btn-logout">Logout</a></li>
                            ';
                        } else {
                            echo '
                                <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-home"></i> Home</a></li>
                                <li class="nav-item"><a href="adminlogin.php" class="nav-link"><i class="fa fa-user-shield"></i> Admin</a></li>
                                <li class="nav-item"><a href="doctorlogin.php" class="nav-link"><i class="fa fa-user-md"></i> Doctor</a></li>
                                <li class="nav-item"><a href="patientlogin.php" class="nav-link"><i class="fa fa-hospital-user"></i> Patient</a></li>
                            ';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
