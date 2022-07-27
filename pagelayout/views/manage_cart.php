<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === "POST")
{

  	if (isset($_POST["Add_to_Cart"])) 
   {
       if(isset($_SESSION['cart'])) //firstly there is no index which is 'cart' in $_SESSION
       {
       	   $myitems=array_column($_SESSION['cart'], 'Item_Name');
           if(in_array($_POST['Item_Name'], $myitems))
           {
             	echo"<script>
            	alert('Item Already Added');
         	    window.location.href='index.php';
         	    </script>";
   
           }

            else
           {
              $count = count($_SESSION['cart']);
              $_SESSION['cart'][$count]=array('Item_Name' => $_POST['Item_Name'],'Price' => $_POST['Price'],'Quantity' => 1, 'Product_total' => 1);
                echo"<script>
         	    alert('Item Added');
         	    window.location.href='index.php';
         	    </script>";      
           }
         	
        }
            else //therefore, setting 'cart' in $_SESSION where in its 0 index store 'Item_Name' , 'Price' , 'Quantity' where in this associative array 'Item_Name' is  $key and $value is $_POST['Item_Name']
           {
               $_SESSION['cart'][0]=array('Item_Name' => $_POST['Item_Name'],'Price' => $_POST['Price'],'Quantity' => 1, 'Product_total' => 1);
                echo"<script>
         	    alert('Item Added');
         	    window.location.href='index.php';
         	    </script>";
               /*print_r($_SESSION['cart']);*/
           }

   }
   if (isset($_POST['Remove_Item'])) 
   {
   	foreach ($_SESSION['cart'] as $key => $value) 
  	  { 
  	  	if($value['Item_Name']==$_POST['Item_Name'])
  	  	{
  	  	unset($_SESSION['cart'][$key]); //delete index
  	     $_SESSION['cart']=array_values($_SESSION['cart']); //rearranging array if any index is missing from the middle of the array or so 
  	     echo"<script>
  	     alert('Item Removed');
  	     window.location.href='mycart.php';
  	     </script>
  	     ";
  	    }
  	  }
   }
   if (isset($_POST["Mod_Quantity"])) 
   {
   	foreach ($_SESSION['cart'] as $key => $value) 
  	  { 
  	  	if($value['Item_Name']==$_POST['Item_Name'])
  	  	{

  	  	 $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity']; //In 'Quantity' index change the value from which is send from $_POST['Mod_Quantity']
  	  	 /*print_r($_SESSION['cart']);*/
  	     echo"<script>
  	     window.location.href='mycart.php';
  	     </script>
  	     ";
  	    }
  	  }
    }
}

?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Cart</title>   
</head>
<body>
	
</body>
</html> -->