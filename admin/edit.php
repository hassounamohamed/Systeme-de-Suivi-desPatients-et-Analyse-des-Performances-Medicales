<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Doctor</title>
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
                        <h5 class="text-center">Edit Doctor</h5>
                        <?php
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];

                                
                                if(is_numeric($id)){
                                    $query = "SELECT * FROM doctors WHERE id='$id'";
                                    $res = mysqli_query($connect, $query);

                                    if(mysqli_num_rows($res) > 0){
                                        $row = mysqli_fetch_array($res);
                                    } else {
                                        echo "Doctor not found.";
                                    }
                                } else {
                                    echo "Invalid doctor ID.";
                                }
                            } else {
                                echo "No doctor ID provided.";
                            }

                            // Check if the form is submitted for updating the salary
                            if(isset($_POST['update']) && isset($id)){
                                $salary = $_POST['salary'];
                                $q = "UPDATE doctors SET salary='$salary' WHERE id='$id'";

                                if(mysqli_query($connect, $q)){
                                    echo "Salary updated successfully.";
                                } else {
                                    echo "Error updating salary.";
                                }
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-8">
                                <?php if(isset($row)) { ?>
                                    <h5 class="text-center">Doctor Details</h5>
                                    <h5 class="my-3">ID: <?php echo $row['id']; ?></h5>
                                    <h5 class="my-3">Firstname: <?php echo $row['firstname']; ?></h5>
                                    <h5 class="my-3">Surname: <?php echo $row['surname']; ?></h5>
                                    <h5 class="my-3">Username: <?php echo $row['username']; ?></h5>
                                    <h5 class="my-3">Email: <?php echo $row['email']; ?></h5>
                                    <h5 class="my-3">Phone: <?php echo $row['phone']; ?></h5>
                                    <h5 class="my-3">Gender: <?php echo $row['gender']; ?></h5>
                                    <h5 class="my-3">Date Registered: <?php echo $row['data_reg']; ?></h5>
                                    <h5 class="my-3">Salary: <?php echo $row['salary']; ?></h5>
                                <?php } ?>
                            </div>

                            <div class="col-md-4">
                                <h5 class="text-center">Update Salary</h5>
                                <form method="post">
                                    <label>Enter Doctor's Salary</label>
                                    <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo isset($row['salary']) ? $row['salary'] : ''; ?>">
                                    <input type="submit" name="update" class="btn btn-info my-3" value="Update Salary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
