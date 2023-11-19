<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM register WHERE email='$email'";
  $result = mysqli_query($connect, $sql);

  if ($result) {
    $recordnumber = mysqli_num_rows($result);

    if ($recordnumber > 0) {
      $row = mysqli_fetch_assoc($result);
      $password_hash = $row['password'];

      if (password_verify($password, $password_hash)) {
        session_start();
        $_SESSION['email'] = $row['email'];
        
        header('location:Home.php');
        exit();
      } else {
        echo "Invalid email or password.";
      }
    } else {
      echo "User not found.";
    }
  } else {
    error_log("Error executing SQL: " . mysqli_error($connect));
    echo "An error occurred. Please try again later.";
  }
}
?>

<!DOCTYPE html>
<head>
	<title>
		Milano Models
	</title>
	<link rel="home" type="text/html" href="Home.php">
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
	<ul class="toplist">
		<li><a href="Home.php">Home</a></li>
		<li><a href="LogIn.php" class="active">Log In</a></li>
		<li><a href="Register.php">Register</a></li>
		<li><a href="SignUp.php">Sign Up</a></li>
	</ul>
	<br>
	<hr>
<body>
	<br>
	<div>
	<form method="post" onsubmit="return validateForm()" action="Home.php">

		<label class="MyLabel">Email</label>
		<input type="text" name="email" placeholder="Enter your email" id="email">
		<div id="emailresult" class="Result"></div>
		<br>
		<br>
		<label class="MyLabel">Password</label>
		<input type="password" name="password" placeholder="Enter password" id="password">
		<div id="passresult" class="Result"></div>

		<input type="submit" name="submit" value="Submit">
	</form>
</div>
	<script>
	function validateForm(){
		let email=document.getElementById('email').value;
		let password=document.getElementById('password').value;
		let emailresult=document.getElementById('emailresult');
		let passresult=document.getElementById('passresult');


		if(email==''|| password==''){
			alert("Fields should not be empty");
		}
		if(!email.match(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-]+)(\.[a-zA-Z]{2,5}){1,2}$/)){
		emailresult.innerHTML="Check your email syntax";
			return false;	
		}else{
			 emailresult.innerHTML="";
		}
		if(password.length< 8){
			passresult.innerHTML="Password should have eight or more charaters";
			return false;
		}else{
			passresult.innerHTML="";
		}
		 if(!password.match(/^[a-zA-Z0-9]*$/)){
		passresult.innerHTML="Password should have only alphanumeric characters";
			return false;	
		}else{
			passresult.innerHTML="";
		}
		 alert('Log in successful');
		 return true;
	}
</script>

	<br>
	<a href="LogIn.php"><button>Cancel</button></a>
	<br>
	<p>Don't have an account? Click link below to register</p>
	<a href="Register.php">Register</a>
</body>
</html>