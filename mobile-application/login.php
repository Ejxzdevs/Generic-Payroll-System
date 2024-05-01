<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>LOGIN DRIVER</title>
</head>
<body>
	<div class="container">
	<form id="form-container" method="post" action="login_BE.php">
		<div class="title">
		<p>Login</p>
		</div>
		<div class="body">
		<label>Username</label>
		<input type="text" name="username" placeholder="Username:">
		<label>Password</label>
		<input type="password" name="password" placeholder="Password:">
		<button type="submit" name="submit" value="LOGIN">SUBMIT</button>
		</div>
		
	</form>
	</div>
</body>
</html>