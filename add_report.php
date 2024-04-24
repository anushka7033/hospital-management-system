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
$date = mysqli_real_escape_string($conn, $_POST["date"]);
$type = mysqli_real_escape_string($conn, $_POST["type"]);
$patient_name = mysqli_real_escape_string($conn, $_POST["patient_name"]);
$mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
$amount = mysqli_real_escape_string($conn, $_POST["amount"]);

// Search for the user by mobile number
$search_sql = "SELECT name FROM users WHERE mobile = '$mobile'";
$search_result = mysqli_query($conn, $search_sql);

if (mysqli_num_rows($search_result) > 0) {
    // User found, get the userid
    $user_row = mysqli_fetch_assoc($search_result);
    $userid = $user_row['name'];

    // Insert report data into table
    $sql = "INSERT INTO reports (userid, date, type, patient_name, amount) 
            VALUES ('$userid', '$date', '$type', '$patient_name', '$amount')";

    if (mysqli_query($conn, $sql)) {
        // Report added successfully
        echo "<script>alert('Report added successfully.'); window.location.href = 'lab.php';</script>";
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // User not found
    echo "<script>alert('User not found. Please check the mobile number.'); window.location.href = 'admin.php';</script>";
}

// Close the database connection
mysqli_close($conn);
?>