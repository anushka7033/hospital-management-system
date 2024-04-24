<?php
// Establish database connection
$servername = "localhost:3344"; // Change this to your MySQL server address
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "hospitaldb"; // Change this to your MySQL database name
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$report_id = mysqli_real_escape_string($conn, $_POST["report_id"]);
$new_status = mysqli_real_escape_string($conn, $_POST["new_status"]);

// Update report status in the database
$sql = "UPDATE reports SET status='$new_status' WHERE id='$report_id'";

if (mysqli_query($conn, $sql)) {
    // Report status updated successfully
    echo "<script>alert('Report status updated successfully.'); window.location.href = 'lab.php';</script>";
} else {
    // Error occurred
    echo "Error updating report status: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>