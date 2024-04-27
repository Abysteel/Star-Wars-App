<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="mystyle.css" />
</head>
<body>
<?php
require('db.php');
if (isset($_REQUEST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
	<form class="login" action="" method="post">
    <h1 class="login-title">Register Here</h1>
		<input type="text" class="login-input" name="username" placeholder="Username" required />
    <input type="text" class="login-input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Adress">
    <input type="password" class="login-input" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password">
    <input type="submit" name="submit" value="Register" class="login-button">
  <p class="login-lost">Already Registered? <a color="black" href="login.php">Login Here</a></p>
  </form>

<style>
	.form {
		text-align: center;
		color: purple;
	  margin right: 250px auto;
	  width:250px;
	}
</style>

<?php } ?>
</body>
</html>
