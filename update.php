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
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);

// Update data in table
$sql = "UPDATE users 
        SET email='$email', address='$address', mobile='$mobile' 
        WHERE name='$name'";

if (mysqli_query($conn, $sql)) {
    // Update successful, set session variable
    $_SESSION['message'] = "Details updated successfully.";

    // Close the database connection
    mysqli_close($conn);

    // Redirect to a success page or back to the form

    header("Location: account.php");
} else {
    // Error occurred, show error message
    $_SESSION['message'] = "Error updating details: " . mysqli_error($conn);
    header("Location: account.php");
}

?>