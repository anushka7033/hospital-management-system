<?php
session_start();

$servername = "localhost:3344"; // Change this to your MySQL server address
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "hospitaldb"; // Change this to your MySQL database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['name'];

$sql = "SELECT * FROM reports WHERE userid='$username'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reports</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <style>
        .report {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
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

        <div class="reports" style="padding-top: 100px;">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $date = $row['date'];
                    $type = $row['type'];
                    $patient_name = $row['patient_name'];
                    $amount = $row['amount'];
                    $status = $row['status'];

                    echo '<div class="report">';
                    echo '<h2>Report Date: ' . $date . '</h2>';
                    echo '<p>Type of Report: ' . $type . '</p>';
                    echo '<p>Patient Name: ' . $patient_name . '</p>';
                    echo '<p>Amount Paid: : ' . $amount . '</p>';
                    echo '<p>Status: <strong>' . $status . '</strong></p>';

                    if ($status == "Report Generated") {
                        echo '<form action="send_report.php" method="post">';
                        echo '<input type="hidden" name="report_id" value="' . $row['id'] . '">';
                        echo '<button type="submit">Send Report via Email</button>';
                        echo '</form>';
                    }

                    echo '</div>';
                }
            } else {
                echo "No reports found.";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>

</html>