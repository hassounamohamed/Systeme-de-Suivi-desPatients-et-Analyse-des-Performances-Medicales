<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log Page</title>
</head>
<body>

<?php
include("include/header.php");
?>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" class="" method="post">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" palceholder="Entre Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" class="form-control" >
                        
                    </div>
                    <input type="submit" name="login" class="btn btn-success"> 
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>


    
</body>
</html>