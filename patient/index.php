<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
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
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                        include("sidenav.php");
                        
                    ?>
                </div>
                <div class="col-md-10">
                <div class="container-fluid">
                    <h4 class="my-2">Patient Dashboard</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My Profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-2" >Book Appointment</h5>
                                        </div>
                                        <div class="col-md-4">
                                        <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-2" >My Invoice</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="invoice.php"><i class="fa fa-file-invoice-dollar fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if (isset($_POST['send'])){
                            $title = $_POST['send'];
                            $message = $_POST['message'];

                            if(empty($title)){

                            }else if(empty($message)){

                            }else{
                                $user = $_SESSION['patient'];
                                $query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";
                                $res = mysqli_query($connect,$query);
                                if($res){
                                    echo "<script>alert('You have sent Your Report')</script>";
                                }
                            }
                        }
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 bg-info p-5 rounded shadow my-5">
                                <h5 class="text-center my-2">Send A Report</h5>
                                <form method ="post">
                                    <label>Titel</label>
                                    <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report">
                                    <br>
                                    <labe>Message</label>
                                    <input type="text" name="message"  class="form-control" placeholder="Enter Message">
                                    <br>
                                    <input type="submit" name="send"  class="btn btn-success my-2" value="Send Report ">
                                </form>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
