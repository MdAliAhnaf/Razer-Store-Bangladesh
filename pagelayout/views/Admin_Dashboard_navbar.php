<?php
session_start();
if (isset($_SESSION['adminname'])) 
{
    echo "<p><i>Logged in as " . "<b>" .$_SESSION['adminname']. "</b>" . "</i></P>";
} 
else 
{
    header("location:Adminlogin.php");
}
?>
<!-- <a href="Logout_Admin.php">Logout</a> -->