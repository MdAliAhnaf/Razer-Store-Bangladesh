<?php 
require 'include_require/header.php'; 
require 'Navbar.php';
    
    /*session_start();*/
    if (isset($_SESSION['username']) && ($_SESSION['username']) != "") {
        header("location:../views/Dashboard.php");
    }
    
    
    $usernameErr = $passErr = $allerror = $nousererror = $error2="";
    $username = $pass = "";
    if (isset($_POST["submit"])) 
    {
        function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

        
        
        if (empty($_POST["username"])) 
        {
            $usernameErr = "<label class='text-danger'>User field cannot be blank!</label>";
        } 
        if (empty($_POST["password"])) 
        {
            $passErr = "<label class='text-danger'>Password field cannot be empty</label>";
        } 

        if(empty($_POST["username"]) && empty($_POST["password"])){
            $allerror = "<label class='text-danger'>Please fill up proper information</label>"; 
        }
        else 
        {   
            $username = test_input($_POST["username"]);
            $pass = test_input($_POST["password"]);
            $queryU = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $resultU = $con->query($queryU);
            
            $rows = mysqli_num_rows($resultU);
            if ($rows == 0){
                
            $usernameErr = "<label class='text-danger'>There is no account associated with this username!</label>";
            }
            
             else{
                /*$query1 = 'SELECT * FROM `user_data` WHERE `Password` = "'.$pass.'"';*/
             $query1 = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"AND `Password` = "'.$pass.'"';
               
             $result = $con->query($query1);
             $rows1 = mysqli_num_rows($result);
             if ($rows1 == 1){
                
             $_SESSION['username'] = $username;
                header("location:../views/Dashboard.php");
                
              if (!empty($_POST['remember']))
                    {
                        setcookie("uname", $_POST['username'], time() + 10);
                        setcookie("pass", $_POST['password'], time() + 10);
                        $_SESSION['username'] = $username;
                    } 
                    else 
                    {
                        setcookie("uname", "");
                        setcookie("pass", "");
                        echo "Cookie not set";
                    }
            }
            else
            {
               $passErr = "<label class='text-danger'>Password doesn't match with user</label>"; 
            }
                                                                                
         }
                           
        }
}
$con->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>LOGIN</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../views/css/signup.css">
  <style type="text/css">
        .error {
            color: red;
        }

    </style>
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
         <h1 align="center" class = "animate-charcter_header_signup"><i>Grab your Gears!</i> </h1>
    </div>
      
      <form class="form" id="form5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onclick="return validateForm(this)"   novalidate >

       <?php
         if (isset($error)) 
        {
            echo $error;
        }
        ?>

        <div class = "form-control">
        <label>User Name</label>
        <input type="text" name="username" id = "user_name" value="<?php if (isset($_COOKIE['uname'])) {
                                                                        echo $_COOKIE['uname'];
                                                                    } ?>">   
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $usernameErr; ?></span> -->
        <small><?php echo $usernameErr; ?></small>
        </div>

        <div class = "form-control"> 
        <label>Password</label>  
        <input type="password" name="password" id="password" value="<?php if (isset($_COOKIE['pass'])) {
                                                                        echo $_COOKIE['pass'];
                                                                    } ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $passErr; ?></small
        >
        </div>

       <label class="checkbox-control">
       <input type="checkbox" name="remember" />
        Remember me
       </label> 
       <div class = "forgot-control"> 
         <a href="../controller/forget_password.php" >
          
              Forgot Password?
            
         </a> 
          </div>     

         <div class = "form-control"> 
         <small><?php echo $allerror; ?></small>
          </div>
         <!-- <input type="submit" name="submit" value="Sign Up" class="btn btn-info"> -->

          
         <div class = "form-control-login"> 
         <button type="submit" name="submit" value="submit" >Sign In</button>
         <!-- <input type="submit" name="submit" value="Sign Up" onclick="return validateForm()" class="btn btn-info">Sign Up</button> -->
         </div>

           
 </form>
 </div>
</section>
<div><br><br><br><br></div>
<?php include '../views/include_require/footer.php'; ?>
</body>
<script src= "../views/js/login.js"></script>
</html>