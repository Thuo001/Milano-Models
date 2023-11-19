<?php
include 'connect.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['idnumber'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $date = $_POST['DOB'];
    $nation = $_POST['nation'];
    $address = $_POST['address'];
    $colour = $_POST['colour'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    

    $sql = "INSERT INTO signup(Id_number, First_name, Last_name, Date_of_birth, Nationality, Physical_Address, Eye_colour, Height, Weight) VALUES ($id,'$fname','$lname',$date,'$nation','$address','$colour',$height,$weight)";

    $result = mysqli_query($connect, $sql);
    if ($result) {
      
      header('location:end.php');

    }else{
      die(mysqli_error($result));
    }
    }

    ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Milano Models</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon1.jpg">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
	<style>
	body { 
			background-image: url('cover.jpg'); 
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

			font-family: 'Roboto Slab', serif;
		}
</style>
</head>
<body>
	<body>
	<ul class="toplist">
		<li><a href="Home.php">Home</a></li>
		<li><a href="LogIn.php">Log In</a></li>
		<li><a href="Register.php">Register</a></li>
		<li><a href="SignUp.php" class="active">Sign Up</a></li>
	</ul>
	<br>
	<hr>
	<br>
	<form method="post">
		<label class="MyLabel">ID Number</label>
		<input type="number" name="idnumber" placeholder="Enter Id number" required>
		<br>
		<br>
		<label class="MyLabel">FirstName</label>
		<input type="text" name="firstName" placeholder="Enter name" required>
		<br>
		<br>
		<label class="MyLabel">LastName</label>
		<input type="text" name="lastName" placeholder="Enter name" required>
		<br>
		<br>
		<label class="MyLabel">Date of Birth</label>
		<input type="date" name="DOB" placeholder="Enter your date of birth" required>
		<br>
		<br>
		<label class="MyLabel">Nationality</label>
		<input type="text" name="nation" placeholder="Enter nationality" required>
		<br>
		<br>
		<label class="MyLabel">Physical Address</label>
		<input type="text" name="address" placeholder="Enter physical address" required>
		<br>
		<br>
		<label class="MyLabel">Eye Colour</label>
		<input type="text" name="colour" placeholder="Enter eye colour" required>
		<br>
		<br>
		<label class="MyLabel">Height</label>
		<input type="number" name="height" placeholder="Enter height in centimeters" required>
		<br>
		<br>
		<label class="MyLabel">Weight</label>
		<input type="number" name="weight" placeholder="Enter weight in kilograms" required>
		<br>
		<br>
		<label class="MyLabel">Type of model</label>
		<br>
		<br>
		<input type="radio" name="type_of_model" value="Alternative"><label>Alternative model</label>
		<br>
		<br>
		<input type="radio" name="type_of_model" value="Runway"><label>Runway model</label>
		<br>
		<br>
		<input type="radio" name="type_of_model" value="Commercial"><label>Commercial model</label>
		<br>
		<a href="end.php"><button>Submit</button></a>
		<br>
	</form>
</body>
<a href="SignUp.php"><button>Reset</button></a>
</body>
</html>