<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style scoped>
        @import "../views/css/bootstrap-5.0.1-iso.css";
    </style>
    <style type="text/css">
        body{
background-color: #00FF66; /* For browsers that do not support gradients */
background-image: linear-gradient(to right, #00FF66 , #00FFFF);
}
.img
{
justify-content: flex-end;
align-items: center;
background-color: #00FF66; /* For browsers that do not support gradients */
background-image: linear-gradient(to right, #00FF66 , #00FFFF);
padding: 0 46.8%; 
}
.container {
  margin-right: 10px;
  margin-left: 0;

  padding-top: ;
    padding-right: 0;
    padding-left: 0;
  }

    </style>
    <title>Profile</title>
</head>

<body> 

 <?php

    require '../views/include_require/user_dashboard_header.php';

?>
<div class="bootstrap-iso">
    <br><br>
    <div class ="img">
        <img src="../views/css/razer_gif.gif" alt="Razer Team Logo" align="center" width="125" height="125">
        </div>
<div class = "container">
      <div class = "row">
       <div class = "col-md-6 offset-md-3 text-center border rounded bg-light my-5">
        <br>
        <h1 class = "animate-charcter_header_signup"><?php echo "<p><i>Hey! " . "<b>" .$_SESSION['username'] . "</b>" . " <br>Your Profile Details</i></p>"?></h1><br>
 
 <?php

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
    
    echo "Full Name           : ";
    echo $name;
    echo nl2br(" \n");
    echo nl2br(" \n");
    echo "Email          : ";
    echo $email;
    echo nl2br(" \n");
    echo "<br>";
    echo "Gender         : ";
    echo $gender;
    echo nl2br(" \n");
    echo "<br>";
    echo "Date of Birth  : ";
    echo $dob;
    echo nl2br(" \n");
    echo "<br>";
    echo "Phone Number   : ";
    echo $phone;
    echo nl2br(" \n");
    echo "<br>";
    echo "Current Address: ";
    echo $preadd;
    echo nl2br(" \n");
    echo "<br>";
    echo "Religion       : ";
    echo $religion;
    echo "<br>";
    echo nl2br(" \n");
    ?>
      </div>
      </div>
      </div>
</div>
</body>
<div><br><br><br></div>
</html>
<?php include '../views/include_require/footer.php'; ?>