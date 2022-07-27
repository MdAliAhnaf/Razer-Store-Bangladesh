<?php 

require '../views/include_require/user_dashboard_header.php';
  /*session_start();*/
  if(count($_SESSION) === 0){

    header("Location: ../controller/Logout.php");
    header("Location: ../views/Login.php");

  }
  if($_SESSION['username'] === ""){

    header("Location: ../controller/Logout.php");
    header("Location: ../views/Login.php");
  }


?>

<?php

$message = '';

$nameErr = $emailErr = $genderErr = $dobErr = $phoneErr = $preaddErr = $relErr = "";
$name = $email = $gender = $dob = $phone = $religion = "";
$preadd = '';
$usernameErr = $passErr = $conpassErr = "";
$usernameError = $emailError = "";
$username = $pass = $conpass = "";


if (isset($_POST["submit"])) 
{
    if (empty($name) || empty($email) ||empty($pass) || empty($gender) || empty($dob) || empty($phone)) 
    {
        $nameErr = "<label class='text-danger'>Name is required</label>";
        $genderErr = "Gender is required";
        $dobErr = "cannot be empty";
        $phoneErr = "<label class='text-danger'>Phone Number is required</label>";
        $preaddErr = "<label class='text-danger'>Current Address is required</label>";
        $relErr = "<label class='text-danger'>Religion is required</label>";  
    }
  $username = $_SESSION['username'];
    function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

    if (empty($_POST["name"])) 
    {
        $nameErr = "<label class='text-danger'>Name is required</label>";
        
    } 
    $name = test_input($_POST["name"]);
    if ((preg_match("/^[a-zA-Z-' ]*$/", $name)) && !empty($_POST["name"]))
    {      
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) 
        {
            $nameErr = "<label class='text-danger'>Only letters and white space is allowed</label>"; 
            $name = "";
        } 
        if (strlen($name) < 2) 
        {
            $nameErr = "<label class='text-danger'>Must contain at least two  words</label>"; 
            $name = "";

        }
        if (empty($_POST["email"])) 
        {
        $emailErr = "<label class='text-danger'>Email is required</label>"; 
        } 
        if (!empty($_POST["email"])) 
        {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "<label class='text-danger'>Invalid email format</label>"; 
            $email = "";
        }
        }
        if (empty($_POST["gender"])) 
        {
        $genderErr = "Gender is required";
        
        } 
        if (!empty($_POST["gender"])) 
        {
        $gender = ($_POST["gender"]);
        if (empty($_POST["dob"])) 
        {
        $dobErr = "cannot be empty";
        
        } 

        }
    if (!empty($_POST["dob"])) 
    {
        $dob = ($_POST["dob"]);
           if (empty($_POST["phone"])) 
    {
        $phoneErr = "<label class='text-danger'>Phone Number is required</label>";  
        
    } 
    if (!empty($_POST["phone"])) 
    {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phone)) 
        {
            $phoneErr = "<label class='text-danger'>Phone number can only have valid 11 digits</label>"; 
            $phone = "";
        }
        if (empty($_POST["preadd"])) 
    {
        $preaddErr = "<label class='text-danger'>Current Address is required</label>";
        
    } 
    if (!empty($_POST["preadd"])) 
    {
        $preadd = test_input($_POST["preadd"]);
        $preadd = '';
        if (empty($_POST["religion"])) 
    {
        $relErr = "<label class='text-danger'>Religion is required</label>";  
        
    } 
    if (!empty($_POST["religion"]) && ($_POST["religion"])==="Islam"||"Christianity"||"N/A"||"Hinduism" ||"Buddhism" ||"Folk religions" ||"Sikhism" || "Judaism") 
    {
        $religion = test_input($_POST["religion"]);
        $religion = "";


if (!empty($name) || !empty($email) || !empty($pass) || !empty($gender) || !empty($dob) || !empty($phone)) 
    {
    
              
            $queryU = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $resultU = $con->query($queryU);
            
            $rowsU = mysqli_num_rows($resultU);

            $queryME = 'SELECT `Email` FROM `user_data` WHERE `Username` = "'.$username.'"';
            $resultME = $con->query($queryME);
            $rowsME = mysqli_num_rows($resultME);

            if ($rowsU == 0){
                
           /* $error2 = "There is no account associated with this username!<br>";*/
                    echo"<script>
                     alert('There is no account associated with this username!');
                     window.location.href='../controller/edit_profile.php';
                     </script>"; 
                     exit();
         }

            

         if ($rowsU == 1)
         {
            $queryE = 'SELECT `Email` FROM `user_data`';
            /*echo var_dump($queryE);*/
            $resultE = $con->query($queryE);           
            $rowsE = mysqli_num_rows($resultE);           
            if ($rowsE == 1 && $rowsME == 0){
                
           /* $error2 = "There is no account associated with this username!<br>";*/
                    echo"<script>
                     alert('Email already exists!');
                     window.location.href='../controller/edit_profile.php';
                     </script>"; 
                     exit();                     
            }
              if($rowsME == 1) 
            {
        
                       
                    /*$queryP = 'UPDATE `user_data` SET `Name` = "'.$name.'" `Email` = "'.$email.'" WHERE `Username` = "'.$username.'"';*/
                    $queryP = 'UPDATE `user_data` SET `Name` = "'.$name.'" ,`Email` = "'.$email.'" ,`Gender` = "'.$gender.'" ,`Dob` = "'.$dob.'" ,`Phone` = "'.$phone.'" ,`Preadd` = "'.$_POST[preadd].'" ,`Religion` = "'.$_POST[religion].'"WHERE `Username` = "'.$username.'"';
                
                    $resultP = $con->query($queryP);
                   if(mysqli_query($con,$queryP))
                    {
        
                     echo"<script>
                     alert('Your profile is Successfully Updated!');
                     window.location.href='../views/View_profile.php';
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
           } 
        
                

              
          }

             else
                {
                    echo"<script>
                     alert('ALL FIELDS empty!');
                     window.location.href='../views/edit_profile.php';
                     </script>";   
                    
                   
                }
            
                                                 

        } 

        else 
        {
                     $relErr = "<label class='text-danger'>Religion is required</label>";  
            
        }

    } 
     $preaddErr = "<label class='text-danger'>Current Address is required</label>";
    }
    /*phone*/
 
    }

    }
    else 
    {
                 $nameErr = "<label class='text-danger'>Only letters and white space is allowed</label>"; 
        
    }
}
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
     <title>Edit Profile Details</title>
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../views/css/signup.css">
    <!-- <script type="text/javascript" src="signup.js" ></script> -->
    <!-- <script defer src= "signup.js"></script> -->
    
     <!-- <style type="text/css">
        


    </style> -->
</head>
<body>
    <br>
    <div class ="img">
        <img src="../views/css/razer_gif.gif" alt="Razer Team Logo" align="center" width="125" height="125">
        </div>
        <br>
          
   <section>
    <div class="container">
    <div class ="header">
         <h1 align="center" class = "animate-charcter_header_signup"><i>Its better to stay Updated!</i> </h1>
    </div> 
                <form class="form" id="form2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onclick="return validateForm(this)"   novalidate >
                <!-- <form action="../views/SignUpAction.php" class="form" id="form1"  method="post" onsubmit="return validateForm()"> -->
        <?php
               
        if (isset($error)) 
        {
            echo $error;
        }
        ?>
        
        <div class = "form-control"> 
        <label for = "name">Name</label>  
        <input type="text" name="name" id="fullname"  placeholder= "Please write your full name" autofocus value="<?php echo $_SESSION['name']; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $nameErr; ?></small>
        </div>

        <div class = "form-control"> 
        <label>E-mail</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $emailErr; ?></span> -->
        <small><?php echo $emailErr; ?></small>
        </div>

        <!-- <label>User Name</label>
        <input type="text" name="username" id = "user_name" placeholder= "Username must be between 3 to 8 words" class="form-control" value="<?php echo $username; ?>">
        <span class="error">* <?php echo $usernameErr; ?></span>
        <br>
        <label>Password</label>
        <input type="text" name="password" class="form-control"> 
        <span class="error">* <?php echo $passErr; ?></span>
        <br> -->
        <div class = "lab"> 
        <label><i>Gender</i></label>
        </div>
        <div class = "zz"> 
            <input type="radio" id="gender" name="gender" value="Male">
            <label for="Male">Male</label>
            <input type="radio" id="gender" name="gender" value="Female">
            <label for="Female">Female</label>
            <input type="radio" id="gender" name="gender" value="Other">
            <label for="Other">Other</label>
        <br>

        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $genderErr; ?></span> -->
        <small><?php echo $genderErr; ?></small>           
        </div> 

        <div class = "lab"> 
        <label><i>Date of Birth</i></label>
        </div> 
        <div class = "form-control">         
        <input type="date" id="dob" name="dob">
                   
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $dobErr; ?></span> -->
        <small><?php echo $dobErr; ?></small>            
        </div> 

         <div class = "form-control"> 
           <label for = "phone">Phone Number</label>
             <input type="tel" id="phone" name = "phone" placeholder= "Number must contain 11 digits"  class="form-control" value="<?php echo $_SESSION['phone']; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $phoneErr; ?></span> -->
        <small><?php echo $phoneErr; ?></small>               
        </div> 
        
         <div class = "form-control">
        
             <label for = "religion">Religion</label>
                        <select name="religion" id="religion">
                             <option value="Islam">Islam</option>
                             <option value="Christianity">Christianity</option>
                             <option value="N/A">N/A</option>
                             <option value="Hinduism">Hinduism </option>
                             <option value="Buddhism">Buddhism</option>
                             <option value="Folk Religion">Folk Religion</option>
                             <option value="Sikhism">Sikhism</option>
                             <option value="Judaism">Judaism</option> 
                             </select> 
        <br>
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $relErr; ?></span> -->
        <small><?php echo $relErr; ?></small>  
        </div>   

        <div class = "form-control">                
            <label for = "preadd">Present Address</label>                   
                                        
        <textarea name="preadd" id="preadd" placeholder= "Please write your current address" rows="2" cols="52" class="form-control" value="<?php echo $_SESSION['preadd']; ?>"></textarea>
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $preaddErr; ?></span> -->

        <small><?php echo $preaddErr; ?></small> 
        </div>
        <br>

        <button id ="reset1" type="reset" name="reset" value="RESET">RESET
        </button>
        <button type="submit" id ="s1" name="submit" value="default" >Update!</button>
        <?php
        if (isset($message)) 
        {
            echo $message;
        }
        ?>
    </form>
    </div>
</section>
<div><br><br><br><br></div>
<?php include '../views/include_require/footer.php'; ?>
</body>
 <script src= "../views/js/editprofile.js"></script>
</html>