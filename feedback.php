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

// Get form data
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
$feedback = mysqli_real_escape_string($conn, $_POST["feedback"]);

// Insert feedback data into table
$sql = "INSERT INTO feedback (name, phone_number, feedback) 
        VALUES ('$name', '$phone_number', '$feedback')";

if (mysqli_query($conn, $sql)) {
    // Feedback submitted successfully
    echo "<script>alert('Thank you for your feedback.'); window.location.href = 'index.php';</script>";
} else {
    // Error occurred
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>