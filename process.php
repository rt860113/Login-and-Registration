<?php
session_start();
require_once('connection.php');
function log_out()
{
	$_SESSION=array();
	session_destroy();
}
function register_validate($connection,$post)
{	
		foreach ($post as $name => $value)
	{
			
		
		if (empty($value)) 
		{
			$_SESSION['error'][$name]=$name.' is empty. Please fill it out.';	
		}
		else
		{
			switch ($name) 
			{
				case 'first_name':
					if (preg_match('/[0-9]/', $value))
					{
						$_SESSION['error'][$name]=$name.' can not contain numbers.';
					}
					break;
				case 'last_name':
					if (preg_match('/[0-9]/', $value))
					{
						$_SESSION['error'][$name]=$name.' can not contain numbers.';
					}
					break;
				case 'email':
					if (!filter_var($value,FILTER_VALIDATE_EMAIL))
					{
						$_SESSION['error'][$name]=$name.' is not in correct form.';
					}
					break;
				case 'birthdate':
					$t_birthdate=explode('/', $value);
					if (!checkdate($t_birthdate[0], $t_birthdate[1], $t_birthdate[2])) 
					{
						$_SESSION['error'][$name]='Please input your birthday in the right format mm/dd/yyyy.';
					}
					else
					{
						$birthdate=$t_birthdate[2]."-".$t_birthdate[0]."-".$t_birthdate[1];
					}
					break;
				case 'password':
					
				case 'confirm_password':
					if (strlen($value)<8)
					{
						$_SESSION['error'][$name]=$name.' can be less than 8.';
					}elseif (($post['password']!=$post['confirm_password'])&&$name=='confirm_password') 
					{
						$_SESSION['error'][$name]=$name.' should match with password you entered.';
					}
					break;
			}
			if (!isset($_SESSION['error']))
			{
				$salt=bin2hex(openssl_random_pseudo_bytes(22));
				$password=crypt($post['password'],$salt);


				$query="INSERT INTO users (first_name,last_name,email,birthdate,password)
				 VALUES ('."$post['first_name']".','"$post['last_name']"','"$post['email']"','."$password".','."$birthdate".')";
				$result=mysqli_query($connection,$query);
				var_dump($result); 
				$query1="SELECT id FROM users WHERE email=".$post['email'];
				$result1=mysqli_query($connection,$query1);
				var_dump($result1);
				$row=mysqli_fetch_assoc($result1);
				var_dump($row);
				// header('Location: profile.php?id='.$row['id']);
			}
		}
	}
}
function log_in($connection,$post)
{
	foreach ($post as $name => $value) 
	{
	
		if (empty($value)) 
		{
			$_SESSION['error'][$name]=$name.'Please input your information.';
		}else
		{
			switch ($name) {
				case 'email':
					$query="SELECT id,email FROM users WHERE email=".$value;
					$result=mysqli_query($connection,$query);
					$row=mysqli_fetch_assoc($result);
					if ($row['email']==$value) 
					{
						$_SESSION;
					}else
					{
						$_SESSION['error'][$name]='Wrong email address.';
					}
					break;
				case 'password':
					$query="SELECT"
					if (condition) {
						# code...
					}
					break;
				
				default:
					# code...
					break;
			}
		}

	}
}










?>