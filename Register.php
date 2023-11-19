<?php
	include 'connect.php';
	$success=0;
    $unsuccess=0;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_hash = password_hash($password, PASSWORD_DEFAULT);

	$sql ="SELECT * FROM register WHERE email='$email'";
    $myresult = mysqli_query($connect,$sql);
    if($myresult){
      $recordnumber= mysqli_num_rows($myresult);
      if($recordnumber>0){
            $unsuccess=1;
      }else{

			$sql = "INSERT INTO register(email, password) VALUES('$email','$password_hash')";

		 $result = mysqli_query($connect, $sql);
    	if ($result) {
      $success=1;
      header('location:LogIn.php');
    } else{
      die(mysqli_error($result));
    }
	}
}
}
?>

<!DOCTYPE html>
<head>
	<title>
		Milano Models
	</title>
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
	<ul class="toplist">
		<li><a href="Home.php">Home</a></li>
		<li><a href="LogIn.php">Log In</a></li>
		<li><a href="Register.php" class="active">Register</a></li>
		<li><a href="SignUp.php">Sign Up</a></li>
	</ul>
	<br>
	<hr>
	<div>
	<form method="post" onsubmit="return validateForm()" action="Home.php">

		<label class="MyLabel">Email</label>
		<input type="text" name="email" placeholder="Enter email" id="email">
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
		}else{emailresult.innerHTML="";

		}

		if(password.length< 8){
			passresult.innerHTML="Password should have eight or more charaters";
			return false;
		}else{passresult.innerHTML="";

		}
		 if(!password.match(/^[a-zA-Z0-9]*$/)){
		passresult.innerHTML="Password should have only alphanumeric characters";
			return false;	
		}else{passresult.innerHTML="";

		}
		 alert('Registration successful');
		 return true;
	}
</script>
		<a href="Register.php"><button>Reset</button></a>
		<br>
		<p>Already Registered? Click below to log in.</p>
	<a href="LogIn.php">Log In</a>
</body>
</html>

<?php
  if ($success) {
    echo "<div style='Color: green; text-align: center;'>Signup successful!!</div>";
  }

  if ($unsuccess) {

     echo "<div style='Color: red; text-align: center;'>Signup not successful!!</div>";
  }
?>