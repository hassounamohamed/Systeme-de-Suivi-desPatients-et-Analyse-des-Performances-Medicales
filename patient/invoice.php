<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Invoice</title>
    </head>
    <body>
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;" >
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2"> My Invoice </h5>
                    <?php
                        $pat = $_SESSION['patient'];
                        $query = "SELECT * FROM patient WHERE username='$pat'";
                        $res = mysqli_query($connect, $query);
                        $row = mysqli_fetch_array($res);
                        $fname = $row['firstname'];

                        $invoice_query = mysqli_query($connect, "SELECT * FROM income WHERE patient='$fname'");
                        $output = "";
                        $output .= "
                            <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Date Discharge</th>
                                    <th>Amount Paid</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>";

                        if (mysqli_num_rows($invoice_query) < 1) {
                            $output .= "
                                <tr>
                                    <td colspan='7' class='text-center'>No Invoice Yet</td>
                                </tr>
                            ";
                        } else {
                            while ($invoice_row = mysqli_fetch_array($invoice_query)) {
                                $output .= "
                                    <tr>
                                        <td>" . $invoice_row['id'] . "</td>
                                        <td>" . $invoice_row['doctor'] . "</td>
                                        <td>" . $invoice_row['patient'] . "</td>
                                        <td>" . $invoice_row['date_discharge'] . "</td>
                                        <td>" . $invoice_row['amount_paid'] . "</td>
                                        <td>" . $invoice_row['description'] . "</td>
                                        <td>
                                           <a href='view.php?id=" . $invoice_row['id'] . "'>
                                            <button class='btn btn-info'>View</button>
                                           </a>
                                        </td>
                                    </tr>
                                ";
                            }
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
