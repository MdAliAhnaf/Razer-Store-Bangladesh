<?php 
require '../views/include_require/user_dashboard_header.php';
$OldpassErr = $passErr = $conpassErr = $allpasserror= "";
?>
      <?php 

        if($_SERVER['REQUEST_METHOD'] === "POST")
        {
            function test_input($data) 
           {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

          $username = $_SESSION['username'];
          $password = test_input($_POST['password']);
          $conPassword = test_input($_POST['conPassword']);
          $oldPassword = test_input($_POST['OldPassword']);

          $queryU = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $resultU = $con->query($queryU);
            
            $rows = mysqli_num_rows($resultU);
            if ($rows == 0){
                
                    echo"There is no account associated with this username!";
                    exit();
            }
          if(empty($oldPassword)){
            $OldpassErr = "<label class='text-danger'>Current password field cannot be empty</label>";
          }
          if(empty($password)){
            $conpassErr = "<label class='text-danger'>New password field is required</label>";
          }
          if(empty($conPassword)){
            $passErr = "<label class='text-danger'>Confirmation of password field cannot be empty</label>";
          }
           
          if(empty($conPassword) && empty($password) && empty($oldPassword))
          {
            $allpasserror= "<label class='text-danger'>Please fill up proper information</label>"; 
            //echo "<br><b>Please fill up proper information.</b>";
          }
          else
          {
            if(strlen($password) < 8 ) 
            {
              $passErr = "<label class='text-danger'>Password must be at least <b>8 characters</label>"; 
              //echo "<br>Password must be at least <b>8 characters</b> in length.</br>";
            }

            else if($conPassword !== $password) 
            { 
              $conpassErr = "<label class='text-danger'>New password and confirm password doesn't match</label>"; 
              //echo "<br><b>New password and confirm password doesn't match.</b></br>";
            }

            else if(!preg_match("#[0-9]+#", $password))
            {
              $passErr = "<label class='text-danger'>Password Must Contain At Least 1 Number!</label>";
              //echo "<br><b>Password Must Contain At Least 1 Number!</b></br>";
            }

            else if(!preg_match("#[A-Z]+#", $password))
            {
               $passErr = "<label class='text-danger'>Password Must Contain At Least 1 Capital Letter!</label>";
              //echo "<br><b>Password Must Contain At Least 1 Capital Letter!</b></br>";
            }

            else if(!preg_match("#[a-z]+#", $password))
            {
              $passErr = "<label class='text-danger'>Password Must Contain At Least 1 Lowercase Letter!</label>";
              //echo "<br><b>Password Must Contain At Least 1 Lowercase Letter!</b></br>";
            }

            else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password))
            {
              $passErr = "<label class='text-danger'>Must contain at least one of the special characters \'^£$%&*()}{@#~?><>,|=_+¬- </label>";
              /*echo "<br><b>Must contain at least one of the special characters \'^£$%&*()}{@#~?><!-- <>,|=_+¬- </b></br>"; -->*/
            }
          
    else
      {
              
            $username = $_SESSION['username'];
              
            $queryU = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $resultU = $con->query($queryU);
            
            $rows = mysqli_num_rows($resultU);
            if ($rows == 0){
                
           /* $error2 = "There is no account associated with this username!<br>";*/
                     echo"There is no account associated with this username!"; 
                     exit();
            }
             
             else
              {

                   $queryOP = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"AND `Password` = "'.$oldPassword.'"';
                   $resultOP = $con->query($queryOP);
                   $rows1 = mysqli_num_rows($resultOP);
 
                 if($rows1 == 1)
 
                {

                    $queryP = 'UPDATE `user_data` SET `Password` = "'.$password.'" WHERE `Username` = "'.$username.'"';
                    $resultP = $con->query($queryP);
                   if(mysqli_query($con,$queryP))
                    {
        
                     echo"<script>
                     alert('Password is changed Successfully!');
                     window.location.href='../views/dashboard.php';
                     </script>";   
                     }
                    else
                    {
                 /*echo var_dump($name);*/
                     echo"<script>
                     alert('SQL Error');
                     
                     </script>";

                    }   
                }
             else
                { $OldpassErr = "<label class='text-danger'>Current/Old Password doesn't match with your following Account!</label>";
                  //echo "Current/Old Password doesn't match with your following Account!"; 
                }

               }

               
      }
   }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Change Password</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../views/css/signup.css">
</head>
<body>
      <br>
    <div class ="img">
        <img src="../views/css/razer_gif.gif" alt="Razer Team Logo" align="center" width="125" height="125">
        </div>
        <br>
          
   <section>
  <!--  <p>Welcome, Your username: <b> <?php //echo $_SESSION['username']; ?> </b></p><hr> -->
  <!-- <p>    <a href="../views/Home.php">Home</a>   |  <a href="Logout.php">Logout</a></p><hr> -->
  <div class="container">
    <div class ="header">
         <h1 align="center" class = "animate-charcter_header_signup"><i>Stay Secured! <?php echo $_SESSION['username']; ?> </i> </h1>
    </div>
      
      <form class="form" id="form3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onclick="return validateForm(this)"   novalidate >

       <?php
         if (isset($error)) 
        {
            echo $error;
        }
        ?>
  
        <div class = "form-control"> 
        <label for = "name">Current/Old password: </label>  
        <input type="password" name="OldPassword" id="OldPassword"  placeholder= "Enter your current Password" autofocus value="<?php //echo $; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $OldpassErr; ?></small>
        </div>

        <div class = "form-control"> 
        <label for = "name">New password: </label>  
        <input type="password" name="password" id="password" value="<?php //echo $; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $passErr; ?></small>
        </div>

        <div class = "form-control"> 
        <label for = "name">Confirm password: </label>  
        <input type="password" name="conPassword" id="conPassword" value="<?php //echo $; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $conpassErr; ?></small>
        </div>
         <div class = "form-control"> 
         <small><?php echo $allpasserror; ?></small>
          </div>
         <!-- <input type="submit" name="submit" value="Sign Up" class="btn btn-info"> -->
         <button type="submit" id=cp1 name="submit" value="submit" >Change Password</button>
         <!-- <input type="submit" name="submit" value="Sign Up" onclick="return validateForm()" class="btn btn-info">Sign Up</button> -->

           
 </form>
 </div>
</section>
<?php include '../views/include_require/footer.php'; ?>
</body>
<script src= "../views/js/change_password.js"></script>
</html>