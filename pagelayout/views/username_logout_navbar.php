<?php
/*session_start();*/
if (isset($_SESSION['username'])) {
    echo "<p><i>Hey! Valuable User " . "<b>" .$_SESSION['username'] . "</b>" . "</i></p>";
} else {
    header("location:Login.php");
}
?>
<!-- <a href="Logout.php">Logout</a> -->