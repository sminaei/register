<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت نام کاربران</title>
<link rel="stylesheet" href="style.css" />
</head>
<body dir="rtl">
	<?php
	require('db.php');

	// If form submitted, insert values into the database.
	if (isset($_REQUEST['username'])){
			// removes backslashes
		$username = stripslashes($_REQUEST['username']);
			//escapes special characters in a string
		$username = mysqli_real_escape_string($con,$username); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$trn_date = date("Y-m-d H:i:s");
			$query = "INSERT INTO users (username,email, password, trn_date)
	VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
			$result = mysqli_query($con,$query);
			if($result){
				echo "<div class='form'>
	<h3>ثبت نام شما با موفقیت انجام شد.</h3>
	<br/>برای ورود روی  <a href='login.php'>اینجا</a> کلیک کنید</div>";
			}
		}else{

	?>
	<div class="form">
	<h3>ثبت نام کاربران</h3>
	<form action="" method="post" name="registration">
		<input type="text" name="username" placeholder="نام کاربری" required />
		<input type="email" name="email" placeholder="ایمیل" required />
		<input type="password" name="password" placeholder="رمز عبور" required />
		<input  name="submit" type="submit" value="ثبت نام" />
	</form>
	</div>
	<?php } ?>
</body>
</html>