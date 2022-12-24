<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ورود کاربران</title>
<link rel="stylesheet" href="style.css" />
</head>
<body dir="rtl">
	<?php
	require('db.php');
	session_start();
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){
			// removes backslashes
		$username = stripslashes($_REQUEST['username']);
			//escapes special characters in a string
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		//Checking is user existing in the database or not
			$query = "SELECT * FROM `users` WHERE username='$username'
	and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
			if($rows==1){
			$_SESSION['username'] = $username;
				// Redirect user to index.php
			header("Location: index.php");
			 }else{
		echo "<div class='form'>
	<h3>نام کاربری یا رمز عبور شما اشتباه است</h3>
	<br/>برای ورود روی <a href='login.php'>اینجا</a> کلیک کنید</div>";
		}
		}else{
	?>
	<div class="form">
		<h3>ورود</h3>
		<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="نام کاربری" required />
			<input type="password" name="password" placeholder="رمز عبور" required />
			<input name="submit" type="submit" value="ورود" />
		</form>
		<p style="font-size: 12px;">هنوز عضو سایت نشده اید؟<a href='registration.php'>هم اکنون ثبت نام کنید</a></p>
	</div>
	<?php } ?>
</body>
</html>