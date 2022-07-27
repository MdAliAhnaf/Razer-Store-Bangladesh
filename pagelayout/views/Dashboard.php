<?php require '../views/include_require/user_dashboard_header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <title>Dashboard</title>
    <link rel="stylesheet" href="../views/css/homepage1.css">
    <style scoped>
        @import "../views/css/bootstrap-5.0.1-iso.css";
    </style>
    <style type="text/css">
        .error {
            color: red;
        }

    </style>
    <style>

.animate1st-charcter
{
   text-transform: default;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip_backward 2s linear infinite;
  display: inline-block;
      font-size: 100px;
}

@keyframes textclip_backward {
  to {
    background-position: 200% center;
  }
}
.animate2nd-charcter
{
   text-transform: default;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip_forward 2s linear infinite;
  display: inline-block;
      font-size: 75px;
}

@keyframes textclip_forward {
  from {
    background-position: 200% center;
  }
}
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
</style>
   
</head>

<body>
    
 <div class="bootstrap-iso">   

    <?php
    /*include 'username_logout_navbar.php';*/
    ?>
    

    <?php  $username = $_SESSION['username'] ?> 

<br><br>

    <div class ="img">
        <img src="../views/css/razer_gif.gif" alt="Razer Team Logo" align="center" width="125" height="125">
        </div>
   <div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <a class="animate1st-charcter"> Hey! <?php echo $username ?> </a>
      <div class="col-md-12 text-center">
      <a class="animate2nd-charcter"> <i>Welcome to your Dashboard</i> </a>
    </div>
  </div>
</div>

   
    
    </div>
  </div>
<div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
<?php require 'include_require/footer.php'; ?>  
</body>
</html>
