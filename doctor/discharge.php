<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Check Patient Appointment</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <?php
            include("../include/header.php");
            include("../include/connection.php");
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">Check Patient Appointment</h5>
                    <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM appointment WHERE id='$id'";
                            $res = mysqli_query($connect, $query);
                            $row = mysqli_fetch_array($res);
                        }
                    ?>
                    <div class="row">
                        <!-- Appointment Details Section -->
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" colspan="2">Appointment Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $row['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Date</td>
                                        <td><?php echo $row['appointment_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Symptoms</td>
                                        <td><?php echo $row['symptoms']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Invoice Section -->
                        <div class="col-md-6">
                            <h5 class="text-center my-3">Invoice</h5>
                            <?php
                                if (isset($_POST['send'])) {
                                    $fee = $_POST['fee'];
                                    $des = $_POST['des'];
                                    if (empty($fee)) {
                                        echo "<div class='alert alert-danger'>Fee is required.</div>";
                                    } else if (empty($des)) {
                                        echo "<div class='alert alert-danger'>Description is required.</div>";
                                    } else {
                                        $doc = $_SESSION['doctor'];
                                        $fname = $row['firstname'];
                                        $query = "INSERT INTO income(doctor, patient, date_discharge, amount_paid, description) 
                                                  VALUES ('$doc', '$fname', NOW(), '$fee', '$des')";
                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            echo "<div class='alert alert-success'>You have successfully created an invoice.</div>";

                                            mysqli_query($connect, "UPDATE appointment SET status='Discharge' WHERE id='$id'");
                                        }
                                    }
                                }
                            ?>
                            <form method="post">
                                <div class="form-group">
                                    <label for="fee">Fee</label>
                                    <input type="number" name="fee" id="fee" class="form-control" autocomplete="off" placeholder="Enter patient fee">
                                </div>
                                <div class="form-group">
                                    <label for="des">Description</label>
                                    <input type="text" name="des" id="des" class="form-control" autocomplete="off" placeholder="Enter description">
                                </div>
                                <button type="submit" name="send" class="btn btn-info btn-block">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
    </body>
</html>
