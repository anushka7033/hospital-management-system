<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #left-panel {
            background-color: #f1f1f1;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 200px;
            padding: 20px;
        }

        #right-panel {
            flex: 1;
            padding: 20px;
            margin-left: 220px;
            /* Adjusted to leave space for the left panel */
        }

        h1,
        h2 {
            margin-top: 0;
        }

        form {
            margin-bottom: 20px;
        }

        .report {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="left-panel">
        <h2>Admin Options</h2>
        <ul>
            <li><a href="#" onclick="showAddReport()">Add Report</a></li>
            <li><a href="#" onclick="showGenerateReport()">Generate Report</a></li>
        </ul>
    </div>

    <div id="right-panel">
        <div id="add-report" style="display: none;">
            <h1>Add Report</h1>
            <form action="add_report.php" method="post">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>

                <label for="type">Type of Report:</label>
                <input type="text" id="type" name="type" required><br><br>

                <label for="patient_name">Patient Name:</label>
                <input type="text" id="patient_name" name="patient_name" required><br><br>

                <label for="mobile">Mobile:</label>
                <input type="tel" id="mobile" name="mobile" required><br><br>

                <label for="amount">Amount:</label>
                <input type="number" step="0.01" id="amount" name="amount" required><br><br>

                <input type="submit" value="Add Report">
            </form>
        </div>

        <div id="generate-report">
            <h1>Processing Reports</h1>
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

            // Fetch and display processing reports
            $sql = "SELECT * FROM reports WHERE status = 'Processing'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="report">
                        <h2>Report ID: <?php echo $row['id']; ?></h2>
                        <p>Date: <?php echo $row['date']; ?></p>
                        <p>Type of Report: <?php echo $row['type']; ?></p>
                        <p>Patient Name: <?php echo $row['patient_name']; ?></p>
                        <p>Status: <?php echo $row['status']; ?></p>
                        <form action="change_status_action.php" method="post">
                            <input type="hidden" name="report_id" value="<?php echo $row['id']; ?>">
                            <select name="new_status">
                                <option value="Processing" <?php if ($row['status'] == "Processing")
                                    echo "selected"; ?>>
                                    Processing</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Reports Generated">Reports Generated</option>
                                <option value="Sample Error">Sample Error</option>
                            </select>
                            <button type="submit">Change Status</button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "No processing reports found.";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </div>

    </div>

    <script>
        function showAddReport() {
            document.getElementById("add-report").style.display = "block";
            document.getElementById("generate-report").style.display = "none";
        }

        function showGenerateReport() {
            document.getElementById("add-report").style.display = "none";
            document.getElementById("generate-report").style.display = "block";
        }
    </script>
</body>

</html>