<?php
session_start();
require '../model/DB.php';
require '../views/nav_user.php';

if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = "";
    }

    if (!isset($_SESSION['checkout'])) {
        $_SESSION['checkout'] = "";
    }
    if($_SESSION['username'] === "" && $_SESSION['checkout'] === "notloggedin"){
        echo"<script>
        alert('For checkout please Login First');
        window.location.href='../views/Login.php';
         </script>"; 
         /*unset($_SESSION['checkout']);*/
    /*header("Location: ../views/Login.php");*/
  }

         if($_SESSION['username'] === ""){
        /*header("Location: ../controller/Logout.php");*/
        echo"<script>
        alert('Please Login First');
        window.location.href='../views/Login.php';
         </script>";
         unset($_SESSION['username']); 
        
    /*header("Location: ../views/Login.php");*/
  }

  $username = $_SESSION['username'];
           $queryU = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $resultU = $con->query($queryU);
            
            $rows = mysqli_num_rows($resultU);
            if ($rows == 0){
                
           /* $error2 = "There is no account associated with this username!<br>";*/
                    echo"<script>
                     alert('There is no account associated with this username!');
                     window.location.href='../views/mycart.php';
                     </script>"; 
            }
            $queryID = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $user_data=mysqli_query($con,$queryID);
            while($user_fetch=mysqli_fetch_assoc($user_data))
            {
              $name=$user_fetch['Name'];
              $email=$user_fetch['Email'];
              $gender=$user_fetch['Gender'];
              $dob=$user_fetch['Dob'];
              $phone=$user_fetch['Phone'];              
              $preadd=$user_fetch['Preadd'];
              $religion=$user_fetch['Religion'];
            }

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['dob'] = $dob;
$_SESSION['phone'] = $phone;
$_SESSION['preadd'] = $preadd;
$_SESSION['religion'] = $religion;
?>
