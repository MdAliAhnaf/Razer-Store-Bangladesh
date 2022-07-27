<?php include 'include_require/header.php';
/*session_start();*/
/*print_r($_SESSION['cart']); */
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <style scoped>
        @import "../views/css/bootstrap-5.0.1-iso.css";
    </style>
	<title>Store</title>   
</head>
<body>
<div class="bootstrap-iso">
  <div class = "container mt-5">
	<div class = "row">
     <div class = "col-lg-3"> <!-- total 12 so each if is 3 then 4 can get space -->
      <form action= "manage_cart.php" method="POST" novalidate>
        <!-- Bootstrap’s card which is an extensible content container-->
       <div class="card"> <!-- <div class="card" style="width: 15rem;"> -->
        <img src="../razer_mouse/Viper_Ultimate_with_ChargingDock-Cyberpunk_2077_Edition_159.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Viper Ultimate with Charging Dock - Cyberpunk 2077 Edition</h5>
            <p class="card-text">Ambidextrous Gaming Mouse with Razer™ HyperSpeed Wireless</p>
            <p class="card-text"> <b>Price: US$159.99</b></p>           
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Viper Ultimate with Charging Dock - Cyberpunk 2077 Edition"> 
          <input type="hidden" name="Price" value="159.99">       
         </div>
        </div>
       </form>
      </div>
      <div class = "col-lg-3">
      <form action= "manage_cart.php" method="POST" novalidate>
       <div class="card">
        <img src="../razer_mouse/DeathAdder_Essential-White_29.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Razer DeathAdder Essential - White<br><br></h5>
            <p class="card-text">Essential gaming mouse with 6,400 DPI optical sensor</p> 
            <p class="card-text"> <b>Price: US$29.99</b></p>         
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Razer DeathAdder Essential - White"> 
          <input type="hidden" name="Price" value="29.99">       
         </div>
        </div>
       </form>
      </div>
      <div class = "col-lg-3">
      <form action= "manage_cart.php" method="POST" novalidate>
       <div class="card">
        <img src="../razer_mouse/DeathAdderV2Pro_GenshinImpact_Edition_139.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Razer DeathAdder V2 Pro - Genshin Impact Edition<br><br></h5>
            <p class="card-text">Wireless gaming mouse with best-in-class ergonomics</p> 
            <p class="card-text"> <b>Price: US$139.99</b></p>         
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Razer DeathAdder V2 Pro - Genshin Impact Edition"> 
          <input type="hidden" name="Price" value="139.99">       
         </div>
        </div>
       </form>
      </div>
      <div class = "col-lg-3">
      <form action= "manage_cart.php" method="POST" novalidate>
       <div class="card">
        <img src="../razer_mouse/Viper_Ultimate_with_ChargingDock-Quartz_149.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Razer Viper Ultimate with Charging Dock - Quartz<br><br></h5>
            <p class="card-text">Ambidextrous Gaming Mouse with Razer™ HyperSpeed Wireless</p> 
            <p class="card-text"> <b>Price: US$149.99</b></p>         
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Razer Viper Ultimate with Charging Dock - Quartz"> 
          <input type="hidden" name="Price" value="149.99">       
         </div>
        </div>
       </form>
      </div>
      <div class = "col-lg-3">
      <form action= "manage_cart.php" method="POST" novalidate>
       <div class="card">
        <img src="../razer_mouse/Viper_Ultimate_with_ChargingDock-Mercury_149.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Razer Viper Ultimate with Charging Dock - Mercury<br><br></h5>
            <p class="card-text">Ambidextrous Gaming Mouse with Razer™ HyperSpeed Wireless</p> 
            <p class="card-text"> <b>Price: US$149.99</b></p>         
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Razer Viper Ultimate with Charging Dock - Mercury"> 
          <input type="hidden" name="Price" value="149.99">       
         </div>
        </div>
       </form>
      </div>
      <div class = "col-lg-3">
      <form action= "manage_cart.php" method="POST" novalidate>
       <div class="card">
        <img src="../razer_mouse/DeathAdderV2-HaloInfinite_79.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Razer DeathAdder V2 - Halo Infinite<br><br></h5>
            <p class="card-text">Wired Gaming Mouse with Best-in-class Ergonomics</p> 
            <p class="card-text"> <b>Price: US$79.99</b></p>         
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Razer DeathAdder V2 - Halo Infinite"> 
          <input type="hidden" name="Price" value="79.99">       
         </div>
        </div>
       </form>
      </div>
      <div class = "col-lg-3">
      <form action= "manage_cart.php" method="POST" novalidate>
       <div class="card">
        <img src="../razer_mouse/Basilisk_Ultimate_with_ChargingDock_169.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Razer Basilisk Ultimate with Charging Dock<br><br></h5>
            <p class="card-text">Wireless Gaming Mouse with 11 Programmable Buttons</p> 
            <p class="card-text"> <b>Price: US$169.99</b></p>         
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Razer Basilisk Ultimate with Charging Dock"> 
          <input type="hidden" name="Price" value="169.99">       
         </div>
        </div>
       </form>
      </div>
      <div class = "col-lg-3">
      <form action= "manage_cart.php" method="POST" novalidate>
       <div class="card">
        <img src="../razer_mouse/DeathAdderV2_SpecialEdition_69.99.png" class="card-img-top" alt="...">
          <div class="card-body text-center">
           <h5 class="card-title">Razer DeathAdder V2 Special Edition<br><br></h5>
            <p class="card-text">Wired Gaming Mouse with Best-in-class Ergonomics</p> 
            <p class="card-text"> <b>Price: US$69.99</b></p>         
          <button class="btn btn-primary" name="Add_to_Cart" type="submit">Add to Cart</button> 
          <input type="hidden" name="Item_Name" value="Razer DeathAdder V2 Special Edition"> 
          <input type="hidden" name="Price" value="69.99">       
         </div>
        </div>
       </form>
      </div>  
     </div>
    </div>
     </div>
     <div><br><br><br><br><br><br><br><br><br><br></div>
    <?php include '../views/include_require/footer.php'; ?>
</body>
</html>