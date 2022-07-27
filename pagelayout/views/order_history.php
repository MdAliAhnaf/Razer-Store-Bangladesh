<?php 
require '../views/include_require/user_dashboard_header.php';
 if($_SESSION['username'] === ""){

    header("Location: ../controller/Logout.php");
   
 header("Location: ../views/Login.php");
  }
  
if(count($_SESSION) === 0){

    header("Location: ../controller/Logout.php");
    header("Location: ../views/Login.php");

  }



$grand_total = 0.0;
$grand_total = (float) 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order History</title>
  <style scoped>
        @import "../views/css/bootstrap-5.0.1-iso.css";
    </style>
  <style type="text/css">
   
.animate1st-charcter
{
   text-transform: Uppercase;
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
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 20px;
}

.animate2nd-charcter
{
   text-transform: lowercase;
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
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 100px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
        h1 {text-align: center;}
        .error {
            color: red;
        }
     </style>  
</head>
<body>
<div class="bootstrap-iso">
<!-- Any HTML here will be styled with Bootstrap CSS -->

	 <div class = "container">
	  <div class = "row">
       <div class = "col-lg-12 text-center border rounded bg-light my-5">
     	<h1>Order History</h1>
      </div>

     <div class = "col-lg-9">
<table class="table">
  <thead class ="text-center">
    <tr>
      <th scope="col">Order No#</th>
      <th scope="col">Item Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Payment Method</th>      
      <th scope="col">Product Total</th>

    </tr>
  </thead>
  <tbody class ="text-center">
  	<?php
  	
           $username = $_SESSION['username'];
           $queryU = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $resultU = $con->query($queryU);
            
            $rows = mysqli_num_rows($resultU);
            if ($rows == 0){
                
           /* $error2 = "There is no account associated with this username!<br>";*/
                    echo"<script>
                     alert('There is no account associated with this username!');
                     window.location.href='../views/mycart.php';
                     </script>"; 
            }
            $queryID = 'SELECT * FROM `user_data` WHERE `Username` = "'.$username.'"';
            $user_data=mysqli_query($con,$queryID);
            while($user_fetch=mysqli_fetch_assoc($user_data))
            {
              $Id=$user_fetch['Id'];
              $name=$user_fetch['Name'];
              $preadd=$user_fetch['Preadd'];
            }
          
            $queryID = 'SELECT * FROM `user_orders` WHERE `Id` = "'.$Id.'"';;
            $user_data=mysqli_query($con,$queryID);
            while($user_fetch=mysqli_fetch_assoc($user_data))
            {
             $grand_total = $grand_total+$user_fetch['Product_total'];
             $Order_ID = $user_fetch['Order_Id'];
             $Item_Name = $user_fetch['Item_Name'];
             $Price = $user_fetch['Price'];
             $Quantity = $user_fetch['Quantity'];
             $Pay_method = $user_fetch['Pay_method'];
             $Product_total = $user_fetch['Product_total'];
             echo"
             <tr>
             <td>
             $Order_ID
             </td>

             <td>
             $Item_Name
             </td>

             <td>
             $Price
             </td>

             <td>
             $Quantity
             </td>

             <td>
             $Pay_method
             </td>

             <td>
             $Product_total
             </td>         
             <br>
             </tr>";
}
        echo "
        <tr>
        <b>User Full Name:</b> 
        $name
        </tr>
        <br>
        <tr>
        <b>Shipping Address:</b> 
        $preadd 
        </tr>";
            
?>

                
 
	

  </tbody>
</table>
</div>
<div class = "col-lg-3">
            <div class =''>  
            <br> <br> <br> <br> <br> <br> <br> <br>            
            <a class="animate1st-charcter text-center">Grand Total: </a>
            <a class="animate2nd-charcter" id="gtotal"> <?php echo number_format($grand_total,2) ?></a>
            <br>
        </div>  
      </div>
     </div>
    </div>
    </div>
</body>
<div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
</html>
<?php include '../views/include_require/footer.php'; ?>