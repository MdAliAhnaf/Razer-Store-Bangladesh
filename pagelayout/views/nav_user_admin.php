<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <style type="text/css">
        .error {
            color: red;
        }
    </style> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->  <div>
    <style scoped>
        @import "../views/css/nav.css";
    </style>
</div>
    <link rel="stylesheet" href="../views/css/homepage1.css">   
</head>
<body>
  <div class="navbar navbar-default navbar-static-top">
 <!--  bootstraps navbar layout -->
 <header>
<nav>
   <ul class="nav__links">
    <li><a class="navbar-brand animate-charcter_header" href="../views/Home.php">Razer Store Bangladesh</a>
    </li>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>  
    </button> -->
        <li>
          <a class="nav-link active" aria-current="page" href="../views/index.php">Store</a>
        </li>
        <li>
          <a class="nav-link active" aria-current="page" href="../views/AdminDashboard.php">Admin Dashboard</a>
        </li>
        <li>
          <a class="nav-link active" aria-current="page" href="../views/View_profile_ad.php">Admin Profile</a>
        </li>
         <li>
          <a class="nav-link active" aria-current="page" href="../controller/manage_all.php">ADMIN Panel Searching</a>
        </li>
        <!-- <li>
          <a class="nav-link active" aria-current="page" href="../controller/user_list.php">Admin Panel Search Result</a>
        </li> -->
        <li>
          <a class="nav-link active" aria-current="page" href="../controller/Logout_Admin.php">Log Out</a>
        </li>
      </ul>
       </nav>    
        <?php
        $count=0;
          if(isset($_SESSION['cart']))
          {
            $count=count($_SESSION['cart']);
          }
        ?>
        <a class="cta" href= "../views/mycart.php"><button type="submit">MY CART (<?php echo $count; ?>)</button></a>        
</header>
</div>
</body>
</html>
