<?php
session_start();

$servername = "localhost:3344";
$username = "root";
$password = "";
$dbname = "hospitaldb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get username from session
$username = $_SESSION['name'];

// Retrieve appointments data for the current user
$sql = "SELECT * FROM appointments WHERE userid = '$username'";
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Appointments </title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
</head>
<div class="container">
    <nav>
        <div class="logo">
            <h1>LifeCare</h1>
        </div>
        <i id="bar" class="fa-solid fa-bars"></i>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Doctor's</a></li>
            <li><a href="index.php">Speciality's</a></li>
            <li><a href="index.php">Patient Review's</a></li>
            <li><a href="index.php">Book Appointment</a></li>
            <li>
                <?php

                if (isset($_SESSION['name'])) {
                    echo '<div class="dropdown">
                <button class="dropbtn">Welcome, ' . $_SESSION['name'] . ' ▼</button>
                <div class="dropdown-content">
                    <a href="account.php">My Account</a>
                    <a href="appointments.php">My Appointments </a>
                    <a href="reports.php">My Reports </a>
                    <a href="logout.php">Logout </a>
                   
                </div>
              </div>';
                } else {
                    echo '<div class="login">
                    <a href="login.html"><i class="fa fa-user"></i></a>
              </div>';
                }
                ?>
            </li>

        </ul>

    </nav>

    <body>
        <div id="doctors">
            <div class="head">
                <h1>Appointments</h1><br>
                <div style="text-align: center;">
                    <table border="1">
                        <tr>
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Phone Number</th>
                            <th>Doctor</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        // Display appointments data in table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['patient_name'] . "</td>";
                            echo "<td>" . $row['phone_number'] . "</td>";
                            echo "<td>" . $row['doctor'] . "</td>";
                            echo "<td>" . $row['appointment_date'] . "</td>";
                            echo "<td>" . $row['appointment_time'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>

            </div>


    </body>

</html>