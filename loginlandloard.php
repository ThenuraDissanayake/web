<?php
session_start();

// Step 1: Establish a database connection
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "my_hostel"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve form data submitted by the user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['User_ID'];
    $password = $_POST['Password'];
    // You may want to do further validation/sanitization here

    // Step 3: Validate the user's credentials against the database
    $sql = "SELECT * FROM st_new WHERE User_ID='$user_id' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user_id;
        header("Location: welcome.php"); // Redirect to a welcome page or dashboard
        exit();
    } else {
        // Login failed
        echo "Invalid username or password";
    }
}

// Step 4: Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

</head>

<body>

    <header>
        <div class="container mt-4 d-flex justify-content-between align-items-center">
            <div class="logo">

                <img src="images/logo01.png" height="70px" width="70px">
            </div>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hostels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact US</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Login
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="login.html">Students</a></li>
                            <li><a class="dropdown-item" href="login.html">Landlords</a></li>
                            <li><a class="dropdown-item" href="login.html">Warden</a></li>
                            <li><a class="dropdown-item" href="login.html">Admin</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <div class="container-01">


        <div class="form-box" id="logbox01">

            <h1 id="heading01">Login</h1>

            <form id="login01" class="input-group" action="" method="post">
                <input type="text" class="input-field" placeholder="Enter your Email or Username" id="textcolor1"
                    name="User_ID" />
                <input type="password" class="input-field" placeholder="Confirm a Password" id="textcolor1"
                    name="Password" />
                <input type="checkbox" class="chech-box"><span id="spn01">Remember me</span><span id="spn02"><a href="">
                        Forgot Password?</span>
                </a>
                <button type="submit" class="submit-btn">Log in</button>
                <h5 id="text0023">Don,t have an account? <a href="registerst.php"> Register now</a></h5>
            </form>

        </div>

    </div>





    <footer class="footer">
        <div class="footer-container">
            <nav class="footer-nav">
                <div class="footer-description">
                    <h4 class="footer-description-title">Hostel</h4>
                    <p>We treat you like<br> Family</p>
                </div>
                <div class="footer-contact-us">
                    <h4 class="footer-description-title">Contact Us</h4>
                    <p class="footer-description-detail">
                        <img src="images/loc01.png" width="15px" height="15px">
                        <span>Mahenwaththe, Homagama</span>
                    </p>
                    <p class="footer-description-detail">
                        <img src="images/phone01.png" width="15px" height="15px">
                        <span>011234567</span>
                    </p>
                    <p class="footer-description-detail">
                        <img src="images/mail01.png" width="15px" height="15px">
                        <span>abcd@gmail.com</span>
                    </p>
                </div>
                <div class="footer-follow-us">
                    <h4 class="footer-description-title">Follow Us</h4>
                    <ul class="footer-follow-us-lists">

                        <a href="">
                            <img src="images/fb01.png" width="25px" height="25px">
                        </a>

                        <a href="">
                            <img src="images/wp01.png" width="25px" height="25px">
                        </a>


                    </ul>
                </div>
            </nav>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>