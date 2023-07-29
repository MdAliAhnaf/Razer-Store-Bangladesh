<?php 
require 'include_require/header.php';
    
    /*session_start();*/

    if (isset($_SESSION['adminname']) && ($_SESSION['adminname']) != "") {
        header("location:../views/AdminDashboard.php");
    }
    
    
    
    $adminnameErr = $adminpassErr = $allerror = $nousererror = $error2="";
    $adminname = $adminpassword = "";
    if (isset($_POST["submit"])) 
    {
        function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

        
       
        if (empty($_POST["adminname"])) 
        {
            $adminnameErr = "<label class='text-danger'>Admin field cannot be blank!</label>";
        } 
        if (empty($_POST["adminpassword"])) 
        {
            $adminpassErr = "<label class='text-danger'>Admin Password field cannot be empty</label>";
        } 

        if(empty($_POST["adminname"]) && empty($_POST["adminpassword"])){
            $allerror = "<label class='text-danger'>Please fill up proper information</label>"; 
        }

        else 
        {   
            $adminname = test_input($_POST["adminname"]);
            $adminpassword  = test_input($_POST["adminpassword"]);
            $queryU = 'SELECT * FROM `user_admin_data` WHERE `Adminname` = "'.$adminname.'"';
            $resultU = $con->query($queryU);
            
            $rows = mysqli_num_rows($resultU);
            if ($rows == 0){
                
            $adminnameErr = "<label class='text-danger'>There is no account associated with this adminname!</label>";
            }
            
             else{
                /*$query1 = 'SELECT * FROM `user_data` WHERE `adminpassword` = "'.$pass.'"';*/
             $query1 = 'SELECT * FROM `user_admin_data` WHERE `Adminname` = "'.$adminname.'"AND `Adminpassword` = "'.$adminpassword .'"';
               
             $result = $con->query($query1);
             $rows1 = mysqli_num_rows($result);
             if ($rows1 == 1){
                
             $_SESSION['adminname'] = $adminname;
                header("location:../views/AdminDashboard.php");
                
              if (!empty($_POST['remember']))
                    {
                        setcookie("aname", $_POST['adminname'], time() + 10);
                        setcookie("pass", $_POST['adminpassword'], time() + 10);
                        $_SESSION['adminname'] = $adminname;
                    } 
                    else 
                    {
                        setcookie("aname", "");
                        setcookie("pass", "");
                        echo "Cookie not set";
                    }
            }
            else
            {
               $adminpassErr = "<label class='text-danger'>Admin Password doesn't match with user</label>"; 
            }
                                                                                
         }
                           
        }
        echo var_dump($adminname);
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
  <!--  <p>Welcome, Your adminname: <b> <?php //echo $_SESSION['adminname']; ?> </b></p><hr> -->
  <!-- <p>    <a href="../views/Home.php">Home</a>   |  <a href="Logout.php">Logout</a></p><hr> -->
  <div class="container">
    <div class ="header">
         <h1 align="center" class = "animate-charcter_header_signup"><i>Maintain Gears!</i> </h1>
    </div>
      
      <form class="form" id="form6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onclick="return validateForm(this)"   novalidate >

       <?php
         if (isset($error)) 
        {
            echo $error;
        }
        ?>

        <div class = "form-control">
        <label>User ADMIN</label>
        <input type="text" name="adminname" id = "user_admin_name" value="<?php if (isset($_COOKIE['aname'])) {
                                                                        echo $_COOKIE['aname'];
                                                                    } ?>">   
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $adminnameErr; ?></span> -->
        <small><?php echo $adminnameErr; ?></small>
        </div>

        <div class = "form-control"> 
        <label>Admin Password</label>  
        <input type="password" name="adminpassword" id="adminpassword" value="<?php if (isset($_COOKIE['pass'])) {
                                                                        echo $_COOKIE['pass'];
                                                                    } ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $adminpassErr; ?></small
        >
        </div>

       <label class="checkbox-control">
       <input type="checkbox" name="remember" />
        Remember me
       </label> 
       <!-- <div class = "forgot-control"> 
         <a href="../controller/forget_adminpassword.php" >
          
              Forgot adminpassword?
            
         </a> 
          </div>  -->    

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
<script src= "../views/js/adminlogin.js"></script>
</html>
