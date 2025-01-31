<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Total Doctors</title>
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
                        <h5 class="text-center">Total Report</h5>
                        <?php
                            $query = "SELECT * FROM report ";
                            $res = mysqli_query($connect, $query);
                            $output = "";

                            $output .= "
                            <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Username</th>
                                    <th>Date Send</th>
                                </tr>";

                            if (mysqli_num_rows($res) < 1) {
                                $output .= "
                                    <tr>
                                        <td colspan='5' class='text-center'>No Report Yet</td>
                                    </tr>
                                ";
                            }


                            while ($row = mysqli_fetch_array($res)) {
                                $output .= "
                                    <tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['title'] . "</td>
                                        <td>" . $row['message'] . "</td>
                                        <td>" . $row['username'] . "</td>
                                        <td>" . $row['date_send'] . "</td>
                        
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
