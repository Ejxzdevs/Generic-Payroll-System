<?php 
session_start();

if(!$_SESSION['user']){
	echo"empty";
	error_reporting(0);
}
else
{
	echo $_SESSION['user'];
}



?>