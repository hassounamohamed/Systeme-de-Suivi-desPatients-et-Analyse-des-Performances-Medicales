<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Total Income</title>
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
                        <h5 class="text-center">Total Income</h5>
                        <?php
                            $query = "SELECT * FROM income ";
                            $res = mysqli_query($connect, $query);
                            $output = "";

                            $output .= "
                            <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Date discharge</th>
                                    <th>Amount paid</th>
                                </tr>";

                            if (mysqli_num_rows($res) < 1) {
                                $output .= "
                                    <tr>
                                        <td colspan='5' class='text-center'>No Patient Discharge Yet</td>
                                    </tr>
                                ";
                            }


                            while ($row = mysqli_fetch_array($res)) {
                                $output .= "
                                    <tr>
                                        <td class='text-center' colspan=''>" . $row['id'] . "</td>
                                        <td>" . $row['doctor'] . "</td>
                                        <td>" . $row['patient'] . "</td>
                                        <td>" . $row['date_discharge'] . "</td>
                                        <td>" . $row['amount_paid'] . "</td>
                        
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
