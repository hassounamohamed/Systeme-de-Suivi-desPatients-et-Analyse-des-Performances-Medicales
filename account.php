<?php
    include("include/connection.php");

    if(isset($_POST['create'])){
        $fname = $_POST['fname'];
        $sname = $_POST['sname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $password = $_POST['pass'];
        $con_pass = $_POST['con_pass'];
        
        $error = array();

        if (empty($fname)) {
            $error['create'] = "Enter Firstname";
        } else if (empty($sname)) {
            $error['create'] = "Enter Surname";
        } else if (empty($uname)) { 
            $error['create'] = "Enter Username";
        } else if (empty($email)) {
            $error['create'] = "Enter your email";
        } else if (empty($phone)) {
            $error['create'] = "Enter Phone";
        } else if ($gender == "") {
            $error['create'] = "Select your Gender";
        } else if (empty($password)) {
            $error['create'] = "Enter Password";
        } else if ($con_pass != $password) {
            $error['create'] = "Both Passwords do not match";
        }

        if(count($error) == 0){
            $query = "INSERT INTO patient(firstname, surname, username, email, phone, gender, password, date_reg, profile) 
                      VALUES('$fname', '$sname', '$uname', '$email', '$phone', '$gender', '$password', NOW(), 'patient.jpg')";
            $res = mysqli_query($connect, $query);

            if($res){
                header("Location: patientlogin.php");
            } else {
                echo "<script>alert('Failed to create account. Please try again.')</script>";
            }
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body style="background-image:url(img/sys.jpg); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <?php
        include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 bg-light p-5 rounded shadow my-3">
                    <h5 class="text-center my-5">Create Account</h5>
                    <div>
                     
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                        
                        <br>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        </div>
                        <br>
        
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off">
                        </div>
                        <br>
                        <input type="submit" name="create" class="btn btn-success" value="Create Account">
                        <p>I already have an account <a href="patientlogin.php">Click here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>