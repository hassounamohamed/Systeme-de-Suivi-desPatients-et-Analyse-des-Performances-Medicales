

<?php
session_start();
include("include/connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    // Validate username
    if (empty($username)) {
        $error['admin'] = "Enter Username";
    }
    // Validate password
    if (empty($password)) {
        $error['admin'] = "Enter Password";
    }

    // If no errors, proceed with login attempt
    if (count($error) == 0) {
        // Prepare the SQL query to prevent SQL injection
        $query = "SELECT * FROM admin WHERE username = ? AND password = ?";

        // Prepare statement
        if ($stmt = mysqli_prepare($connect, $query)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);

            // Execute query
            mysqli_stmt_execute($stmt);

            // Get result
            $result = mysqli_stmt_get_result($stmt);

            // Check if the query returned exactly one result
            if (mysqli_num_rows($result) == 1) {
                echo "<script>alert('You have logged in as an admin')</script>";
                $_SESSION['admin'] = $username;
                // Redirect to admin dashboard or home page
                header("Location: admin/index.php");
                exit();
            } else {
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        } else {
            echo "<script>alert('Database query error')</script>";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log Page</title>

</head>
<body style="background-image:url('img/sys.jpg'); background-repeat:no-repeat; background-size:cover;">

<?php
include("include/header.php");
?>

<!-- Added margin-top correctly as inline style -->
<div style="margin-top: 20px;"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-light p-5 rounded shadow">
            <!-- Admin Image -->
            <img src="img/admin.jpg" alt="Admin" class="img-fluid mb-4">

            <!-- Login Form -->
            <form action="" method="post" class="my-2">

                    <div >
                    <?php
                    if (isset($error['admin'])) {
                        echo "<h4 class='alert alert-danger'>" . $error['admin'] . "</h4>";
                    }
                    ?>


                    </div>
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" id="username" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="pass" class="form-control" id="password" required>
                </div>
                <div class="text-center">
                    <input type="submit" name="login" class="btn btn-success mt-3" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
