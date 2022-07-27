<?php

if (isset($_SESSION['username'])) {
    echo "<h1>Profile Details of User: " . $_SESSION['username'] . "</h1>";
} else {
    header("location:Login.php");
}
?>
