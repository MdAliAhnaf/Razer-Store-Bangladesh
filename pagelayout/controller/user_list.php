<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style scoped>
        @import "../views/css/bootstrap-5.0.1-iso.css";
    </style>
    <style type="text/css">
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
.container {
  margin-right: 10px;
  margin-left: 0;

  padding-top: ;
    padding-right: 0;
    padding-left: 0;
  }

    </style>
    <title>Admin Panel Search Result</title>
</head>

<body> 

 <?php
    require '../views/include_require/user_admin_dashboard_header.php';
    require '../model/user_list_db_action.php';

?>
<div class="bootstrap-iso">
    <br><br>
    <div class ="img">
        <img src="../views/css/razer_gif.gif" alt="Razer Team Logo" align="center" width="125" height="125">
        </div>
<div class = "container">
      <div class = "row">
       <div class = "col-md-6 offset-md-3 text-center border rounded bg-light my-5">
        <br>
        <h1 class = "animate-charcter_header_signup"><?php echo"Search Results</i></p>"?></h1><br>
 
 <?php

$usernameErr="";

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
            $usernameErr = "<label class='text-danger'>Name field cannot be blank!</label>";
        } 
        else if (!empty($_POST["name"])) 
    {
        $name = test_input($_POST["name"]);
    }
    }    

	if (isset($_GET['name'])) {
		$searchKey = $_GET['name'];
		$result = get($searchKey);	
	}
	else {
		$result = getAll();
	}
    
   

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			  $name=$row['Name'];
              $email=$row['Email'];
              $_password=$row['Password'];
              $gender=$row['Gender'];
              $dob=$row['Dob'];
              $phone=$row['Phone'];              
              $preadd=$row['Preadd'];
              $religion=$row['Religion'];
	    }

	echo "Full Name           : ";
    echo $name;
    echo nl2br(" \n");
    echo nl2br(" \n");
    echo "Email          : ";
    echo $email;
    echo nl2br(" \n");
    echo "<br>";

    echo "User Password         : ";
    echo $_password;
    echo nl2br(" \n");
    echo "<br>";
    echo "Gender         : ";
    echo $gender;
    echo nl2br(" \n");
    echo "<br>";
    echo "Date of Birth  : ";
    echo $dob;
    echo nl2br(" \n");
    echo "<br>";
    echo "Phone Number   : ";
    echo $phone;
    echo nl2br(" \n");
    echo "<br>";
    echo "Current Address: ";
    echo $preadd;
    echo nl2br(" \n");
    echo "<br>";
    echo "Religion       : ";
    echo $religion;
    echo "<br>";
    echo nl2br(" \n");
	}
	else {
		echo "No record(s) found";
        echo nl2br(" \n");
        echo nl2br(" \n");
        echo "<div><br><br><br><br><br><br><br><br><br><br></div>";
	}
    echo nl2br(" \n");echo nl2br(" \n");
    ?>
      </div>
      </div>
      </div>
</div>
</body>
<div><br><br><br><br><br><br></div>
</html>
<?php include '../views/include_require/footer.php'; ?>