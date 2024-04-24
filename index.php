<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeCare</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="dropdown.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Dancing+Script:wght@700&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <h1>LifeCare</h1>
            </div>
            <i id="bar" class="fa-solid fa-bars"></i>

            <ul>
                <li><a href="">Home</a></li>
                <li><a href="#doctors">Doctor's</a></li>
                <li><a href="#speciality">Speciality's</a></li>
                <li><a href="#patient">Patient Review's</a></li>
                <li><a href="#contact">Book Appointment</a></li>
                <li>
                    <?php
                    session_start();
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

        <div class="main">
            <div class="mainText">
                <h1>The Hospital that <br>Care for you</h1>
                <h3>Best Team's</h3>
                <!-- <p> Lorem ipsum dolor sit amet consectetur adipisicing elit</p> -->
                <button>Show More</button>
            </div>
            <img src="mains.png" alt="">
        </div>


        <div id="doctors">
            <div class="head">
                <h1>Our Doctor's</h1>
            </div>
            <div class="doctors">
                <div class="card">
                    <img src="dt1.jpg" alt="">
                    <div style="text-align: center;">
                        <p>Dr Alexa</p>
                        <p>Physician</p>
                    </div>

                </div>
                <div class="card">
                    <img src="dt2.jpg" alt="">
                    <div style="text-align: center;">
                        <p>Dr Lisa</p>
                        <p>Pediatrician</p>
                    </div>

                </div>
                <div class="card">
                    <img src="dt3.jpg" alt="">
                    <div style="text-align: center;">
                        <p>Dr Alok</p>
                        <p>Orthopedic</p>
                    </div>
                </div>

                <div class="card">
                    <img src="dt4.jpg" alt="">
                    <div style="text-align: center;">
                        <p>Dr Laxmi</p>
                        <p>Dentist</p>
                    </div>
                </div>

                <div class="card">
                    <img src="dt5.jpg" alt="">
                    <div style="text-align: center;">
                        <p>Dr Gajendra</p>
                        <p>Neurologist</p>
                    </div>
                </div>

                <div class="card">
                    <img src="dt6.jpg" alt="">
                    <div style="text-align: center;">
                        <p>Dr Smit</p>
                        <p>Surgeon</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="speciality">
            <div class="head">
                <h1>Our Speciality</h1>
            </div>
            <div class="surgery">
                <div class="surgeryCard">
                    <img src="s1.png" alt="">
                    <p>Succesfully Knee Transplant</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
                <div class="surgeryCard">
                    <img src="s2.png" alt="">
                    <p>Succesfully Knee Surgery</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>

                </div>
                <div class="surgeryCard">
                    <img src="s3.png" alt="">
                    <p>Succesfully Knee Surgery</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>

                </div>
            </div>
        </div>

        <div id="patient">
            <div class="head">
                <h1>Our Patient's Review</h1>
            </div>
            <div class="patients">
                <div class="patientCard">
                    <img src="p1.png" alt="">
                    <img src="p2.png" alt="">

                </div>
                <div class="patientCard">
                    <img src="p3.jpg" alt="">
                    <img src="p4.jpg" alt="">



                </div>
                <div class="patientCard">
                    <img src="p5.jpg" alt="">
                    <img src="p6.jpg" alt="">

                </div>
            </div>
        </div>
        <div class="head">

        </div>
        <div class="contact">
            <h1>Write a review</h1>
            <form action="feedback.php" method="post">
                <input type="text" name="name" placeholder="Enter Your Name" required>
                <input type="tel" name="phone_number" placeholder="Enter Your Phone Number" required>
                <textarea name="feedback" placeholder="Enter Your Feedback" required></textarea>

                <button type="submit">Submit Feedback</button>
            </form>
        </div>


        <div id="contact">
            <div class="head">
                <h1>Appointment <span>Us</span></h1>
            </div>
            <div class="contact">
                <h1>Book Appointment</h1>
                <form action="book.php" method="post">
                    <input type="text" name="patient_name" placeholder="Enter Patient Name" required>
                    <input type="tel" name="phone_number" placeholder="Enter Phone Number" required>
                    <select name="doctor" placeholder="Select Doctor" required>
                        <option value="">Select Doctor</option>
                        <option value="Dr. Alexa">Dr. Alexa - Physician</option>
                        <option value="Dr. Lisa">Dr. Lisa - Pediatrician</option>
                        <option value="Dr. Alok">Dr. Alok - Orthopedic</option>
                        <option value="Dr. Laxmi">Dr. Laxmi - Dentist</option>
                        <option value="Dr. Gajendra">Dr. Gajendra - Neurologist</option>
                        <option value="Dr. Smit">Dr. Smit - Surgeon</option>

                    </select>
                    <br><br>
                    <label for="appointment_date">Select Appointment Date:</label>
                    <input type="date" name="appointment_date" id="appointment_date" required><br><br>

                    <label for="appointment_time">Select Appointment Time:</label>
                    <select name="appointment_time" id="appointment_time" required>
                        <option value="">Select Time</option>

                    </select>

                    <button type="submit">Book</button>
                    <script>
                        var select = document.getElementById("appointment_time");
                        var startTime1 = 10 * 60; // 10:00 AM converted to minutes
                        var endTime1 = 14 * 60;   // 2:00 PM converted to minutes
                        var startTime2 = 17 * 60; // 5:00 PM converted to minutes
                        var endTime2 = 20 * 60;   // 8:00 PM converted to minutes
                        var interval = 15;        // 15-minute intervals

                        for (var i = startTime1; i <= endTime1; i += interval) {
                            var hours = Math.floor(i / 60);
                            var minutes = i % 60;
                            var timeString = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;
                            select.add(new Option(timeString, timeString));
                        }

                        for (var j = startTime2; j <= endTime2; j += interval) {
                            var hours = Math.floor(j / 60);
                            var minutes = j % 60;
                            var timeString = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;
                            select.add(new Option(timeString, timeString));
                        }
                    </script>
                </form>

            </div>
        </div>

        <div class="footer">
            <div class="text">
                <h3>About Us</h3>
                <p>24 Hour's</p>
                <p>Top Doctors</p>
                <p>Best Care</p>
                <p>Patient</p>

            </div>
            <div class="text">
                <h3>Speciality</h3>
                <p>Spin Surgery</p>
                <p>Knee Surgery</p>
                <p>Leg Surgery</p>
                <p>Tendon Surgery</p>

            </div>
            <div class="text">
                <h3>Best Teams</h3>
                <p>Doctor</p>
                <p>Nursing</p>
                <p>Staff</p>
                <p>Hospital</p>

            </div>
            <div class="text">
                <h3>Address</h3>
                <p>Near MG Road</p>
                <p>Galaxy Care</p>
                <p>333-00222</p>
                <p>2222-4334</p>

            </div>
        </div>

        <div class="content">
            <button id="close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="contentDetail">

            </div>
        </div>

    </div>
    <script src="index.js"></script>
</body>

</html>