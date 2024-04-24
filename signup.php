<style>
    #message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #90EE90;
        color: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
</style>

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
$blood_group = mysqli_real_escape_string($conn, $_POST["blood_group"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$password = mysqli_real_escape_string($conn, $_POST["pass"]);
$confirm_password = mysqli_real_escape_string($conn, $_POST["pass2"]);

// Check if password and confirm password fields match
if ($password !== $confirm_password) {
    $_SESSION['message'] = "Error: Password and confirm password fields do not match";
    header("Location: index.html");
    exit();
}


// Insert data into table
$sql = "INSERT INTO users (name, email, address, mobile, blood_group, gender, password) 
        VALUES ('$name', '$email', '$address', '$mobile', '$blood_group', '$gender', '$password')";

if (mysqli_query($conn, $sql)) {
    // Account created successfully, set session variable
    $_SESSION['message'] = "Account created successfully. Redirecting to login page.";

    // Close the database connection
    mysqli_close($conn);

    // Redirect to login page after 3 seconds
    echo "<script>setTimeout(function() {
        window.location.href = 'login.html';
    }, 3000);</script>";
} else {
    // Error occurred, show error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
<div id="message">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</div>