<?php
session_start();
require_once('connection.php');
?>
<html>
<head>
	<meta charset='utf-8'>
	<title>Login and Registration</title>
</head>
<body>
	<div class='register'>
		<form action='process.php' method='post'>
			<p>Register Now!</p>
			<input type='hidden' name='action' value='register'>
			<input type='text' name='first_name' placeholder='First Name'>
			<input type='text' name='last_name' placeholder='Last Name'>
			<input type='text' name='email' placeholder='Email Address'>
			<input type='text' name='birthdate' placeholder='Birthdate'>
			<input type='text' name='password' placeholder='Password'>
			<input type='text' name='confirm_password' placeholder='Retype Your Password'>
			<input type='submit' value='Register'>
		</form>
	</div>
		<div class='login'>
		<form action='process.php' method='post'>
			<p>Login In Here</p>
			<input type='hidden' name='action' value='login'>
			<input type='text' name='email' placeholder='Email'>
			<input type='text' name='password' placeholder='Password'>
			<input type='submit' value='Log In'>
		</form>
	</div>
</body>
</html>
<style type="text/css">
	div
	{
		display: inline-block;
		vertical-align: top;
		width: 500px;
		height: 500px;
		border: 1px solid black;
	}

</style>