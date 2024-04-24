<?php
// Start the session
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

// Retrieve the user's information from the database
$name = $_SESSION['name'];
$sql = "SELECT * FROM users WHERE name = '$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User found, fetch all details
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $address = $row['address'];
    $blood_group = $row['blood_group'];
    $gender = $row['gender'];
    $password = $row['password'];
} else {
    // User not found
    echo "Error: User not found";
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account Details</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
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

        <div id="doctors">
            <div class="head">
                <h1>Account Details</h1><br><br>
                <form action="update.php" method="post">
                    <label>Name:</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" readonly><br><br>
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
                    <label>Address:</label>
                    <input type="text" name="address" value="<?php echo $address; ?>" readonly><br><br>
                    <label>Mobile:</label>
                    <input type="tel" name="mobile" value="<?php echo $mobile; ?>"><br><br>
                    <label>Blood Group:</label>
                    <input type="text" name="blood_group" value="<?php echo $blood_group; ?>" readonly><br><br>
                    <label>Gender:</label>
                    <input type="text" name="gender" value="<?php echo $gender; ?>" readonly><br><br>
                    <input type="submit" value="Update">
                </form>
                <p class="para-2" style="text-align: center;">
                    <br>
                    <a href="index.php"> Return to home</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>