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

// Sign-up logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // No hashing for simplicity

    // Insert data into the users table
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful!";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $loginEmail = $_POST["loginEmail"];
    $loginPassword = $_POST["loginPassword"];

    // Retrieve data from the users table
    $sql = "SELECT id, name, email, password FROM users WHERE email='$loginEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($loginPassword === $row["password"]) {
            echo "Login successful! Welcome, " . $row["name"];
            // Redirect to welcome page with user ID as a parameter
            header("Location: welcome.php?id=" . $row['id']);
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found. Please sign up.";
    }
}

// Close the database connection
$conn->close();
?>
