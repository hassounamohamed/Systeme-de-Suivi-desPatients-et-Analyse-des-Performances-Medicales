<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light p-3">
                <?php
                    include("sidenav.php");
                ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <h5 class="text-center my-4">Book Appointment</h5>
                <?php
                    $pat = $_SESSION['patient'];
                    // Retrieve patient details from the database
                    $sel = mysqli_query($connect, "SELECT * FROM patient WHERE username='$pat'");
                    $row = mysqli_fetch_array($sel);
                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $gender = $row['gender'];
                    $phone = $row['phone']; 

                    if (isset($_POST['book'])) {
                        $date = $_POST['date'];
                        $sym = $_POST['sym'];

                        if (empty($sym)) {
                            echo "<div class='alert alert-danger'>Please enter symptoms.</div>";
                        } else {
                            // Insert appointment into the database
                            $query = "INSERT INTO appointment (firstname, surname, gender, phone, appointment_date, symptoms, status, sate_booked) 
                                      VALUES ('$firstname', '$surname', '$gender', '$phone', '$date', '$sym', 'Pending', NOW())";
                            $res = mysqli_query($connect, $query);

                            if ($res) {
                                echo "<div class='alert alert-success'>You have booked an appointment successfully.</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Failed to book appointment. Please try again.</div>";
                            }
                        }
                    }
                ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow p-4">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Appointment Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sym" class="form-label">Symptoms</label>
                                    <input type="text" name="sym" id="sym" class="form-control" placeholder="Enter Symptoms" required>
                                </div>
                                <button type="submit" name="book" class="btn btn-primary w-100">Book Appointment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
