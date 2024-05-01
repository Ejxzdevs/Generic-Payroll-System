
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="page2.php" method="post" >
		<h1>hello</h1>
		<input type="text" name="username">
		<input type="submit" name="submit">
<?php
	$_SESSION['user'] = "HEY";
	unset($_SESSION['user']);

?>
	</form>

</body>
</html>