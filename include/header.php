<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMS Home Page</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css">

    <!-- jQuery (Bootstrap 5 no longer requires jQuery, but if you need it, include the correct version) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">Medical Management System</h5>

        <div class="ms-auto"></div> <!-- Ensures items are aligned to the right -->

        <ul class="navbar-nav">
            <?php
                if(isset($_SESSION['admin'])){
                    $user =$_SESSION['admin'];
                    echo '

            <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
                    ';

                }else{
                    echo '            <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white">Doctor</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white">Patient</a></li>';
                }

            ?>

        </ul>
    </nav>
</body>
</html>
