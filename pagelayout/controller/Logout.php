<?php  
session_start();
session_unset();
if (isset($_SESSION['username'])) 
{
	session_destroy();
	header("location:../views/login.php");
}
else
{
	header("location:../views/login.php");
}
