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

// Get form data
$patient_name = mysqli_real_escape_string($conn, $_POST["patient_name"]);
$phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
$doctor = mysqli_real_escape_string($conn, $_POST["doctor"]);
$appointment_date = mysqli_real_escape_string($conn, $_POST["appointment_date"]);
$appointment_time = mysqli_real_escape_string($conn, $_POST["appointment_time"]);

// Get username from session
$username = $_SESSION['name'];

// Insert appointment data into table
$sql = "INSERT INTO appointments (userid, patient_name, phone_number, doctor, appointment_date, appointment_time) 
        VALUES ('$username', '$patient_name', '$phone_number', '$doctor', '$appointment_date', '$appointment_time')";

if (mysqli_query($conn, $sql)) {
    // Appointment booked successfully
    echo "<script>alert('Appointment booked successfully.'); window.location.href = 'index.php';</script>";
} else {
    // Error occurred
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>