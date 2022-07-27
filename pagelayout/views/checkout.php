<?php 
require '../views/include_require/user_dashboard_header.php';
/*$Total = $_SESSION['grand_total'];*/
  /*session_start();*/
  if(count($_SESSION) === 0){

    header("Location: ../controller/Logout.php");
    header("Location: ../views/Login.php");

  }
  if($_SESSION['username'] === ""){

    echo"<script>
        alert('For checkout please Login First');
        window.location.href='../views/Login.php';
         </script>"; 
   
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


if (isset($_POST["checkout"])) 
{     
    $_SESSION['checkout'] = "notloggedin";
    if (empty($_POST["pay_method"])) 
          {
              $payErr = "Selection of a payment method is required";
              echo"<script>
                     alert('Please select a Payment Method');
                     window.location.href='../views/mycart.php';
                     </script>"; 
              exit();
          } 
            else if (!empty($_POST["pay_method"])) 
          {
              $pay_method = ($_POST["pay_method"]);
          }

    if($_SESSION['username'] === "")
     {
        exit();
     }

    foreach ($_SESSION['cart'] as $key => $value) 
      { 
        
         $_SESSION['cart'][$key]['Product_total'] = (($_SESSION['cart'][$key]['Quantity'])*($_SESSION['cart'][$key]['Price']));
         
      }
    
     
    function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
 
           $username = $_SESSION['username'];
           $pay_method = test_input($_POST["pay_method"]);

  
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
            }
          
             if(mysqli_query($con,$queryID))
             {
                 
                 /*$Id=mysqli_insert_id($con);*/
                 $query2 = "INSERT INTO `user_orders`(`Id`, `Item_Name`, `Price`, `Quantity`, `Pay_method`,`Product_total`) VALUES (?,?,?,?,?,?)";

                 /*$stmt = $con->prepare("INSERT INTO `user_orders`(`Id`, `Item_Name`, `Price`, `Quantity`, `Pay_method`,`Product_total`) VALUES ('$Id',?,?,?,'$pay_method',?)";
                 $stmt->execute();
                 $stmt->close();

                 $stmt->bind_param("siii", ,$Item_Name,$Price,$Quantity,$Product_total);*/

                 $stmt = mysqli_prepare($con,$query2);
                if($stmt)
                {

                 mysqli_stmt_bind_param($stmt,"isdisd",$Id,$Item_Name,$Price,$Quantity,$pay_method,$Product_total);
                 foreach ($_SESSION['cart'] as $key => $value) 
                   { 
                     
                        $Item_Name = $value['Item_Name'];
                        $Price = $value['Price'];                                                                                                       
                        $Quantity = $value['Quantity'];
                        $Product_total = $value['Product_total'];
                        /*$pay_method = $value['pay_method'];*/
                        mysqli_stmt_execute($stmt);     
                   }
                       if($_SESSION['username'] != "")
                       {
                       unset($_SESSION['cart']);
                       echo"<script>
                       alert('Order Placed');
                       window.location.href='order_history.php';
                      </script>";
                       }
                   }
             else
             {

                     echo"<script>
                     alert('SQL Query Prepared Error');
                     window.location.href='../views/mycart.php';
                     </script>"; 
             }
                                       
          }
          else
          {
                     echo"<script>
                     alert('Selection of SQL Query Error');
                     window.location.href='../views/mycart.php';
                     </script>"; 
          }
     
}
$con->close();
?>