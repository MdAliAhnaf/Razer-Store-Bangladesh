<?php
require 'include_require/header.php';
/*$usernameError = true;
$emailError = true; */
$message = '';
$currentID = "";
$nameErr = $emailErr = $genderErr = $dobErr = $phoneErr = $preaddErr = $relErr = "";
$name = $email = $gender = $dob = $phone = $religion = "";
$preadd = '';
$usernameErr = $passErr = $conpassErr = "";
$usernameError = $emailError = "";
$username = $pass = $conpass = "";
$checker = "";

if (isset($_POST["submit"])) 
{   
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
    else if (!empty($_POST["name"])) 
    {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) 
        {
            $nameErr = "<label class='text-danger'>Only letters and white space is allowed</label>"; 
            $name = "";
        } 
        else if (strlen($name) < 2) 
        {
            $nameErr = "<label class='text-danger'>Must contain at least two  words</label>"; 
            $name = "";
        }
    }

    if (empty($_POST["email"])) 
    {
        $emailErr = "<label class='text-danger'>Email is required</label>"; 
    } 
    else if (!empty($_POST["email"])) 
    {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "<label class='text-danger'>Invalid email format</label>"; 
            $email = "";
        }
    }
    if (empty($_POST["username"])) 
    {
        $usernameErr = "<label class='text-danger'>User Name is required</label>"; 
    } 
    else if (!empty($_POST["username"])) 
    {
        $username = ($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-'_]*$/", $username)) 
        {
            $usernameErr = "<label class='text-danger'>Only letters and underscores are allowed</label>"; 
            $username = "";
        } 
        else if (strlen($username) < 3) 
        {
            $usernameErr = "<label class='text-danger'>Must contain at least three  words</label>"; 
            $username = "";
        }
        else if(strlen($username) >= 9)
        {
            $usernameErr = "<label class='text-danger'>Cannot exceed more than eight words</label>"; 
            $username = "";
        }

    }

    if (empty($_POST["password"])) 
    {
        $passErr = "<label class='text-danger'>Password is required</label>"; 
    } 

    else if (!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirmpassword"])) 
    {
        $pass = ($_POST["password"]);
        if (strlen($pass) < 8) 
        {
            $passErr = "<label class='text-danger'>Password cannot be less than eight (8) characters</label>"; 
            $pass = "";
        } 
        else if (!preg_match("#[0-9]+#", $pass)) 
        {
            $passErr = "<label class='text-danger'>Password Must Contain At Least 1 Number!</label>"; 
            $pass = "";
        }
        else if (!preg_match("#[A-Z]+#", $pass)) 
        {
            $passErr = "<label class='text-danger'>Password Must Contain At Least 1 Capital Letter!</label>"; 
            $pass = "";
        }
        else if (!preg_match("#[a-z]+#", $pass)) 
        {
            $passErr = "<label class='text-danger'>Password Must Contain At Least 1 Lowercase Letter!</label>"; 
            $pass = "";
        }
        else if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass)) {
            $passErr = "<label class='text-danger'>Must contain at least one of the special characters \'^£$%&*()}{@#~?><>,|=_+¬- </label>"; 
            $pass = "";
        }
    }

    if (empty($_POST["confirmpassword"])) 
    {
        $conpassErr = "<label class='text-danger'>This field is required</label>"; 
    } 
    else if (!empty($_POST["confirmpassword"])) 
    {
        if ($_POST["password"] == $_POST["confirmpassword"]) 
        {
            $conpass = $_POST["confirmpassword"];
        } 
        else 
        {
            $conpassErr = "<label class='text-danger'>Password doesn't matches</label>"; 
        }
    }
    if (empty($_POST["gender"])) 
    {
        $genderErr = "Gender is required";
    } 
    else if (!empty($_POST["gender"])) 
    {
        $gender = ($_POST["gender"]);
    }

    if (empty($_POST["dob"])) 
    {
        $dobErr = "cannot be empty";
    } 
    else if (!empty($_POST["dob"])) 
    {
        $dob = ($_POST["dob"]);
    }


    if (empty($_POST["phone"])) 
    {
        $phoneErr = "<label class='text-danger'>Phone Number is required</label>";  
    } 
    else if (!empty($_POST["phone"])) 
    {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phone)) 
        {
            $phoneErr = "<label class='text-danger'>Phone number can only have valid 11 digits</label>"; 
            $phone = "";
        } 
    }

    if (empty($_POST["preadd"])) 
    {
        $preaddErr = "<label class='text-danger'>Current Address is required</label>";  
    } 
    else if (!empty($_POST["preadd"])) 
    {
        $preadd = test_input($_POST["preadd"]);
        $preadd = ''; 
    }

    if (empty($_POST["religion"])) 
    {
        $relErr = "<label class='text-danger'>Religion is required</label>";  
    } 
    else if (!empty($_POST["religion"]) && ($_POST["religion"])==="Islam"||"Christianity"||"N/A"||"Hinduism" ||"Buddhism" ||"Folk religions" ||"Sikhism" || "Judaism") 
    {
        $religion = test_input($_POST["religion"]);
        $religion = ""; 
    }

    if (!empty($name) && !empty($email) && !empty($pass) && !empty($conpass) && !empty($gender) && !empty($dob) && !empty($phone)) 
    {
        
        /*session_start();*/
        $queryU = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
        $resultU = $con->query($queryU);
        $queryE = 'SELECT * FROM `user_data` WHERE `Email` = "'.$email.'"';
        $resultE = $con->query($queryE);
        if($resultU->num_rows > 0 && $resultE->num_rows > 0) // output data of each row
        {
            echo"<script>
                     alert('Both Username and Email Exists!');
                     window.location.href='Sign_up.php';
                     </script>"; 
                     exit(); 
                    /* $checker = "u" && $checker = "e"*/
        }

        $query1 = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
        $result = $con->query($query1);
        if ($result->num_rows > 0){ // output data of each row
            echo"<script>
                     alert('Username already Exists');
                     window.location.href='Sign_up.php';
                     </script>";  
        $error = "This username is already taken!<br>";
        $checker = "u";
        exit();
       }

        $query1 = 'SELECT * FROM `user_data` WHERE `Email` = "'.$email.'"';
        $result = $con->query($query1);
        if ($result->num_rows > 0){ // output data of each row
            echo"<script>
                     alert('Email is already in use');
                     window.location.href='Sign_up.php';
                     </script>";  
        $error = "Email is already in use!<br>";
        $checker = "e";
        exit();
       }

       /*$query1 = "SELECT id FROM user_data ORDER BY id DESC LIMIT 1";
       $result = $con->query($query1);
       $row = $result->fetch_assoc();
       $currentID = $row['Id']+1;
*/
       $stmt = $con->prepare("INSERT INTO `user_data`(`Name` , `Email` , `Username` , `Password` , `Gender` , `Dob` ,`Phone` , `Preadd`, `Religion`) VALUES (?,?,?,?,?,?,?,?,?)");

       
       if($stmt)
       {
        $stmt->bind_param("sssssssss", $name ,$email ,$username ,$pass ,$gender ,$dob ,$phone,$_POST["preadd"] , $_POST["religion"]);
       $stmt->execute();
       $stmt->close();
        echo"<script>
                     alert('You have successfully signed up');
                     window.location.href='../views/Login.php';
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

$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
     <title>Sign up Razer Store</title>
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
         <h1 align="center" class = "animate-charcter_header_signup"><i>Get ready to Sign Up!</i> </h1>
    </div> 
                <form class="form" id="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onclick="return validateForm(this)"   novalidate >
                <!-- <form action="../views/SignUpAction.php" class="form" id="form1"  method="post" onsubmit="return validateForm()"> -->
        <?php
        /*if($usernameError==true)
        {
            echo "Username Already Exists";
        }
        ?>
        <br><br>
        <?php              
        if ($emailError==true)
        {
                echo "Email Already Exists";
               
        }
           */           
        if (isset($error)) 
        {
            echo $error;
        }
        ?>

        <div class = "form-control"> 
        <label for = "name">Name</label>  
        <input type="text" name="name" id="fullname"  placeholder= "Please write your full name" autofocus value="<?php echo $name; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $nameErr; ?></small>
        </div>

        <div class = "form-control"> 
        <label>E-mail</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $emailErr; ?></span> -->
        <small><?php echo $emailErr; ?></small>
        </div>

        <div class = "form-control">
        <label>User Name</label>
        <input type="text" name="username" id = "user_name" placeholder= "Username must be between 3 to 8 words" value="<?php echo $username; ?>">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $usernameErr; ?></span> -->
        <small><?php echo $usernameErr; ?></small>
        </div>
        
        <div class = "form-control"> 
        <label>Password</label>
        <input type="text" name="password" id = "password" class="form-control"> 
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $passErr; ?></span> -->
        <small><?php echo $passErr; ?></small>
        </div>
       
        <div class = "form-control"> 
        <label>Confirm password</label>
        <input type="text" name="confirmpassword" id = "confirmpassword"class="form-control">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $conpassErr; ?></span> -->
        <small><?php echo $conpassErr ?></small>
        </div>

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
             <input type="tel" id="phone" name = "phone" placeholder= "Number must contain 11 digits"  class="form-control" value="<?php echo $phone; ?>">
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
                                        
        <textarea name="preadd" id="preadd" placeholder= "Please write your current address" rows="2" cols="52" class="form-control" value="<?php echo $preadd; ?>"></textarea>
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $preaddErr; ?></span> -->

        <small><?php echo $preaddErr; ?></small> 
        </div>
        <br>
                       
        <button id ="reset1" type="reset" name="reset" value="RESET">RESET
        </button>
         <!-- <input type="submit" name="submit" value="Sign Up" class="btn btn-info"> -->
         <button type="submit" id ="s1" name="submit" value="submit" >Sign Up</button>
         <!-- <input type="submit" name="submit" value="Sign Up" onclick="return validateForm()" class="btn btn-info">Sign Up</button> -->

 
        
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
 <script src= "../views/js/signup.js"></script>
</html>