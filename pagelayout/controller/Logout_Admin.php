<?php  
session_start();
if (isset($_SESSION['adminname'])) 
{
	session_destroy();
	header("location:../views/Adminlogin.php");
}
else
{
	header("location:../views/Adminlogin.php");
}
