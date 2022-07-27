<?php 
require '../views/include_require/user_admin_dashboard_header.php';
$usernameErr=$nameErr="";   

/*    if (isset($_SESSION['username']) && ($_SESSION['username']) != "") {
        header("location:../views/Dashboard.php");
    }
    
    
    $usernameErr = $passErr = $allerror = $nousererror = $error2="";
    $username = $pass = "";
    if (isset($_POST["submit"])) 
    {

}*/
//$con->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>ADMIN Panel Searching</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../views/css/signup.css">
   <script src= "../views/js/innerhtmlvalidate.js"></script>
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
         <h1 align="center" class = "animate-charcter_header_signup"><i>Search User Data!</i> </h1>
    </div>
      
      <form class="form" id="form_admin_manage" action="../controller/user_list.php" method="get" onclick="validateForm(this)" novalidate>

       <?php
         if (isset($error)) 
        {
            echo $error;
        }
        ?>

        <!-- <div class = "form-control">
        <label>User Name</label>
        <input type="text" name="username" id = "user_name"> 
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <small><?php //echo $usernameErr; ?></small>
        </div> -->

        <div class = "form-control"> 
        <label for = "name">User FullName</label>  
        <input type="text" name="name" id="fname">
        <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <!-- <span class="error"> <?php //echo $nameErr; ?></span> -->
        <small><?php echo $nameErr; ?></small>
        <br>
        <span class="error" id="fnameErr"></span>
        </div>



          
         <div class = "form-control-login"> 
         <button type="submit" name="submit" value="Search" >Search</button>
         <!-- <input type="submit" name="submit" value="Sign Up" onclick="return validateForm()" class="btn btn-info">Sign Up</button> -->
         </div>
         
 </form>
 </div>
</section>
<div><br><br><br><br></div>

 <p id="records"></p>

    <script>
        function verifyAndSend(pForm) {
            let user_name = pForm.user_name.value;
            let fname = pForm.fname.value;
            let requestURL = pForm.action;

            document.getElementById("user_name").innerHTML = "";

            /*document.getElementById("user_name").innerHTML = "";
            
            if (user_name === "") {
                document.getElementById("user_nameErr").innerHTML = "Blank!!";
            }
            else {
                let xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById('records').innerHTML = this.responseText;
                }

                xhttp.open("GET", requestURL + "?user_name=" + user_name);
                xhttp.send();
            }*/

            if (fname === "") {
                document.getElementById("fnameErr").innerHTML = "Blank!!";
            }
            else {
                let xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById('records').innerHTML = this.responseText;
                }

                xhttp.open("GET", requestURL + "?fullname=" + fname);
                xhttp.send();
            }

        }
    </script>
</body>
<script src= "../views/js/admin_panel_manage.js"></script>
</html>
<?php include '../views/include_require/footer.php'; ?>