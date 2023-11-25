<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "modelling";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user ID from the URL parameter
$user_id = isset($_GET['id']) ? $_GET['id'] : null;

// Retrieve user's name from the database
$sql = "SELECT name FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_name = $row['name'];
} else {
    // Handle the case where user data is not found
    $user_name = "Guest";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Milano</title>
    <link rel="stylesheet" href="HOME.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="simple-blended">

    <header class="header">
        <a href="#" class="logo">Milano.</a>

        <nav class="navbar">
            <a href="home.php" style="--i:1;" class="Active">Home</a>
            <a href="ABOUT.html" style="--i:2;">About</a>
            <a href="app.html" class="btn" style="--i:3;">Application</a>
        </nav>

        <div class="social-media">
            <a href="#" style="--i:1;"><i class='bx bxl-twitter'></i></a>
            <a href="#" style="--i:2;"><i class='bx bxl-facebook-circle'></i></a>
            <a href="#" style="--i:3;"><i class='bx bxl-instagram'></i></a>
        </div>
    </header>

    <section class="home">
        <div class="home-content">
            <h1>Welcome, <?php echo $user_name; ?>!</h1>
            <h3>Milano Modelling Agency.</h3>
            <p>We are always looking for new and fresh looks to add to our growing enterprise. With collaboration of the big leagues of Fashion, we want to create new rising stars in the modeling business.</p>
            <a href="#" class="btn">Explore Modelling</a>
        </div>

        <div class="home-img">
            <div class="rhombus">
                <img src="side-profile.png" alt="Profile Image">
            </div>
        </div>

        <div class="rhombus2"></div>
    </section>

</body>

</html>
