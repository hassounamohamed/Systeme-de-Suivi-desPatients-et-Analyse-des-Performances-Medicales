<?php
include("include/connection.php");

$show = "";

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    // Validate input fields
    if (empty($uname)) {
        $error['login'] = "Enter Username";
    } else if (empty($password)) {
        $error['login'] = "Enter Password";
    } else {
        // Query to check login credentials
        $q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
        $qq = mysqli_query($connect, $q);

        // Check if query executed and returned a row
        if ($qq && mysqli_num_rows($qq) > 0) {
            $row = mysqli_fetch_array($qq);

            // Check account status
            if ($row['status'] == "Pending") {
                $error['login'] = "Please wait for the admin to confirm your account.";
            } else if ($row['status'] == "Rejected") {
                $error['login'] = "Your application was rejected. Try again later.";
            } else {
                // Login successful
                echo "<script>alert('Login Successful')</script>";
                session_start();
                $_SESSION['doctor'] = $uname;

                // Redirect to dashboard
                header("Location: doctor/index.php");
                exit();
            }
        } else {
            $error['login'] = "Invalid Username or Password.";
        }
    }

    // Display the first error if any
    if (isset($error['login'])) {
        $show = "<h5 class='text-center alert alert-danger'>" . $error['login'] . "</h5>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-image:url(img/sys.jpg); background-size: cover; background-repeat: no-repeat;">

<?php include("include/header.php"); ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 bg-light p-5 rounded shadow my-3">
                <h5 class="text-center my-5">Doctors Login</h5>
                <div>
                    <?php echo $show; ?>
                </div>
                <form method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" autocomplete="off">
                    </div>
                    <br>
                    <input type="submit" name="login" class="btn btn-success" value="Login">
                    <p>I don’t have an account <a href="apply.php">Apply Now !!!</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
