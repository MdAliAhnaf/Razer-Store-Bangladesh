<?php
require '../views/include_require/header.php';
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