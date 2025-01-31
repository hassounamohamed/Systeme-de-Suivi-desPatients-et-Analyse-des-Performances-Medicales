
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
/* Sidebar Styling */
.sidenav {
    width: 220px;
    height: 100vh;
    background-color: #17a2b8; /* Bootstrap Info Color */
    position: fixed;
    box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
    padding-top: 20px;
}

/* Sidebar Links */
.sidenav .list-group a {
    color: #138496;
    font-weight: bold;
    padding: 15px 20px;
    border: none;
    transition: all 0.3s ease-in-out;
}

/* Hover Effect */
.sidenav .list-group a:hover {
    background-color: #138496;
    transform: translateX(5px);
    border-left: 5px solid white;
    color: white;
}

/* Active Link Effect */
.sidenav .list-group a.active {
    background-color: #138496;
    border-left: 5px solid white;
}

    </style>

<div class="col-md-2 sidenav p-0">
                <div class="list-group text-center">
                    <a href="index.php" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
                    <a href="patient.php" class="list-group-item list-group-item-action">Patient</a>
                    <a href="appointment.php" class="list-group-item list-group-item-action">Appointment</a>
                   
                </div>
            </div>
    
</body>
</html>






