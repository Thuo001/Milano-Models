<?php
// Replace these values with your database credentials
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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $modeling_type = $_POST["modelingType"];
    $terms_accepted = isset($_POST["termsCheckbox"]) ? 1 : 0; // 1 if checked, 0 if unchecked

    // Insert data into the database
    $sql = "INSERT INTO model_application (first_name, last_name, email, password, gender, modeling_type, terms_accepted)
            VALUES ('$first_name', '$last_name', '$email', '$password', '$gender', '$modeling_type', $terms_accepted)";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
