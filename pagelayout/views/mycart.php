<?php include 'include_require/header.php';
/*session_start();*/
$payErr="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <style scoped>
        @import "../views/css/bootstrap-5.0.1-iso.css";
    </style>
    
	<title>Cart</title> 
  <style type="text/css">
        h1 {text-align: center;}
        .error {
            color: red;
        }
     </style>  
</head>
<body>
<div class="bootstrap-iso">
	 <div class = "container">
	  <div class = "row">
       <div class = "col-lg-12 text-center border rounded bg-light my-5">
     	<h1>My Cart</h1>
      </div>

     <div class = "col-lg-9">
<table class="table">
  <thead class ="text-center">
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class ="text-center">
  	<?php
  	/*$total=0;*/
  	if(isset($_SESSION['cart']))
  	{  
      $gt=0;
  	  foreach ($_SESSION['cart'] as $key => $value) //data fetching from $_SESSION 's 'cart' index and the index's value is assigned/passed to $key,here the value of $value is additionally assigned to the current element's key to the $key variable on each iteration.On each iteration the array pointer is moved by one, until it reaches the last array element
  	  {
  	  	$sr=($key+1); //index no. +1 increment Serial No. Increasing after adding items through array index
  	  	/*$total=$total+$value['Price'];*/
  		echo"
        <tr>
             <td>$sr</td> 
             <td>$value[Item_Name]
             </td>
             <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'>
             </td>
             <td>
             <form action='manage_cart.php' method='POST'>
             <input class='text-center iquantity' name='Mod_Quantity' onchange= 'this.form.submit()' type ='number' value='$value[Quantity]' min='1' max='20'>
             <input type ='hidden' name='Item_Name' value='$value[Item_Name]'>

             </form>
             </td>
             <td class= 'itotal'>
             </td>
             <td>
               <form action='manage_cart.php' method='POST'>
                  <button name = 'Remove_Item'class = 'btn btn-sm btn btn-outline-danger'>REMOVE</button>
                  <input type ='hidden' name='Item_Name' value='$value[Item_Name]'>
                </form>
             </td>
        </tr>
  		";
     /*$_SESSION['grand_total'] = $gt=$gt+($value['Price'])*($value['Quantity']);*/

  	  }/* echo $gt;*/
     
    }
    /*var_dump($_SESSION['cart'])*/
  	?> 
  </tbody>
</table>
      </div>

      	 <div class = "col-lg-3">
      		<div class ='border bg-light rounded'>     			
      		<h4>Grand Total: </h4>
      		<h5 class="text-right" id="gtotal"></h5>
      		<br>
          <?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
          {
            
     
          if (!empty($_POST["pay_method"])) 
          {
              $pay_method = ($_POST["pay_method"]);
          }
      
          ?>
      		<!-- <div class="d-grid gap-2 col-4 mx-auto"> -->
      		<form action='checkout.php' method='POST'>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="pay_method" value="COD" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                       Cash on Delivery
                    </label>
                    <br>
            <span class="error"> <?php /*echo $payErr ;*/ ?></span>
                   </div>
                   <br>
      			<button type="submit" class="btn btn-primary btn-block" class='text-center iquantity' name='checkout'>Checkout</button>
      	  </form>
          <?php 
           }

           /*var_dump($_SESSION['cart']);*/
          ?>
      	 <!-- </div> -->
       </div>
      </div>
     </div>
    </div>
</div>
<script>

var gt=0;	
var iprice=document.getElementsByClassName('iprice'); //accessing elements of class iprice not neccessary to keep the class and variable name same
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');

function subTotal()
{
	gt=0; //calculating grand total from the beginning
	for(i=0;i<iprice.length;i++)
	{
		itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
		gt=gt+(iprice[i].value)*(iquantity[i].value);
	} 
	gtotal.innerText=gt; //In headings innertext print gt	
/*jsVar=document.getElementById("gtotal").innerHTML;
alert(jsVar);*/

}

subTotal();

</script>
<?php /*$_SESSION['grand']='<script type="text/javascript">document.write(jsVar);</script>';
echo $_SESSION['grand'];*/ ?>
<div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
</body>
</html>
<?php include '../views/include_require/footer.php'; ?>