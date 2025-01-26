<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Total Appointment</title>
    </head>
    <body>
        <?php
            include("../include/header.php");
            include("../include/connection.php");
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                        include("sidenav.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                        <h5 class="text-center">Total Appointment</h5>
                        <?php
                            $query = "SELECT * FROM appointment WHERE status='pending' ";
                            $res = mysqli_query($connect, $query);
                            $output = "";

                            $output .= "
                            <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Surname</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Appointment Date</th>
                                    <th>Symptoms</th>
                                    <th>Date Booked</th>
                                    <th>Action</th>
                                </tr>";

                            if (mysqli_num_rows($res) < 1) {
                                $output .= "
                                    <tr>
                                        <td colspan='10' class='text-center'>No Appointment Yet</td>
                                    </tr>
                                ";
                            }

                            while ($row = mysqli_fetch_array($res)) {
                                $output .= "
                                    <tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['firstname'] . "</td>
                                        <td>" . $row['surname'] . "</td>
                                        <td>" . $row['gender'] . "</td>
                                        <td>" . $row['phone'] . "</td>
                                        <td>" . $row['appointment_date'] . "</td>
                                        <td>" . $row['symptoms'] . "</td>
                                        <td>" . $row['sate_booked'] . "</td>
                                        <td>
                                           <a href='discharge.php?id=" . $row['id'] . "'>
                                            <button class='btn btn-info'>Check</button>
                                           </a>
                                        </td>
                                    </tr>
                                ";
                            }

                            $output .= "</table>";
                            echo $output;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
