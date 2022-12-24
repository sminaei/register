<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه داشبورد</title>
<link rel="stylesheet" href="style.css" />
</head>
<body dir="rtl">
	<div class="form">
		<p>خوش آمدی <?php echo $_SESSION['username']; ?>!</p>
		<p>This is secure area.</p>
		<p><a href="dashboard.php">داشبورد</a></p>
		<a href="logout.php">خروج</a>
	</div>
</body>
</html>