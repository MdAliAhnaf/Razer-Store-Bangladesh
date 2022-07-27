<!DOCTYPE html>
<html lang="en">
<?php require 'include_require/header.php'; 
$_SESSION['count_comment'] = 0;
?>

<?php 
$nameErr = $emailErr = $commentzErr = "";
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
    }

    if (empty($_POST["email"])) 
    {
        $emailErr = "<label class='text-danger'>Email is required</label>";  
    }  
    else if (!empty($_POST["email"])) 
    {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["commentz"])) 
    {
        $commentzErr = "<label class='text-danger'>Comment is required</label>";  
    }  
    else if (!empty($_POST["commentz"])) 
    {
        $commentzz = test_input($_POST["commentz"]);
    }
    if (!empty($name) && !empty($email) && !empty($commentzz)) 
    {

       $stmt = $con->prepare("INSERT INTO `comments_section`(`Namec` , `Emailc` , `Commentz`) VALUES (?,?,?)");

       
       if($stmt)
       {
        $stmt->bind_param("sss", $name ,$email ,$commentzz);
       $stmt->execute();
       $stmt->close();
        echo"<script>
                     alert('Your Response has been received');
                     window.location.href='../views/home.php';
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
    else{
    echo"<script>
                     alert('Please fill up all the field');
                     
                     </script>";
   }
}

?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> 
    <style scoped>
        @import "../views/css/bootstrap-5.0.1-iso.css";
    </style>
    <style scoped>
        @import "../views/css/comments.css";
    </style>
    <!-- <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css"> -->
     <!-- <style >
        @import "../views/css/nBoot.css";
    </style> --> 
    <title>Home</title>
    <style type="text/css"> 
      body{
        background-color: #00FF66; /* For browsers that do not support gradients */
        background-image: linear-gradient(to right, #00FF66 , #00FFFF);
     }
     
    </style>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    <?php 
    $count=2;
    if(isset($_SESSION['update_comment']))
        {
          
            $count=$count+2;
          
      }
    ?>
    $(document).ready(function(){ /* after document is loaded everything will load via ready */
        var commentCount=2;
    $("button").click(function(){   /* $() selector */
     commentCount=commentCount+2; 
         $("#comments").load("load-comments.php", {
           commentNewCount: commentCount /* normally "string is used" bt for variable commentNewCount passed as post*/
         });  /* loading comments from div class container load qJuery AJAX function load func 3 parameters(URL,data,callback) load linked file, using post method to include data in the linked file, callback*/  
        });
    });

    </script>  
</head>

<body>
<div class="bootstrap-iso">
    <?php /*include '../views/Navbar.php';*/ ?>

    <div class="container1">
  <div class="row1">
    <div class="col-md-12 text-center">
      <a class="animate-charcter"> Razer 
          <div class="col-md-12 text-center"> ST
<img src="../views/css/razer_gif.gif" alt="Razer Team Logo" align="center" width="300" height="300">
RE
</div>
       Bangladesh</a>
    </div>
  </div>
</div>
</div>

    <img src="../views/css/homepagewallpaper.png" alt="Razer HomePage Wallpaper" align="center" width="1903" height="1070.43">

   

    

    
<link rel="stylesheet" href="../views/css/home_comment.css" class="last"> 
<div class="last">
<div id = "comments">

<div class="bootstrap-iso">
<div class = "container">
    <br>
    <p class="comments-title">Comments (<?php echo $count; ?>)</p>
      <div class = "row">
        <div class = "col-lg-12">
        <table class="table">
  <thead class ="text-center">
    <tr>
    <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Comment</th>
      

    </tr>
  </thead>
  <tbody class ="text-center">
<?php
          
          //$sqlshowvalue = 2;

           $queryU = "SELECT * FROM comments_section";
            $resultU = $con->query($queryU);
            
            $rows = mysqli_num_rows($resultU);
            if ($rows == 0){
                
                    echo "There are no comments!"; 
            }
            //$queryID = "SELECT * FROM comments_section ORDER BY Idc DESC limit ".$sqlshowvalue;
            $queryID = "SELECT * FROM comments_section ORDER BY Idc DESC limit 2";
            $user_data=mysqli_query($con,$queryID);
            while($user_fetch=mysqli_fetch_assoc($user_data))
            {
              $cname = $user_fetch['Namec'];
              $cemail = $user_fetch['Emailc'];
              $c_comments = $user_fetch['Commentz'];
            
            echo "<tr>";
                echo "<td><br>" . $user_fetch['Namec'] . "</td>";
                echo "<td><br>" . $user_fetch['Emailc'] . "</td>";
                echo "<td ><br>" . $user_fetch['Commentz'] . "<br><br><br></td>";
                
            echo "</tr>";
            }
       
                
?>
    <div class="be-comment">
        <div class="be-img-comment">    
            <a href="blog-detail-2.html">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
            </a>
        </div>
        <div class="be-comment-content">
            <span class="be-comment-name">
                <a href="blog-detail-2.html"><?php echo $cname; ?></a>
            </span>
            <span class="be-comment-time">
                <i class="fa fa-clock-o"></i>
                April 16, 2022 at 08:14am
            </span>
            <p class="be-comment-text">
                <?php echo $c_comments ?>
            </p>
        </div>
    </div>
    <div class="be-comment">
        <div class="be-img-comment">    
            <a href="blog-detail-2.html">
                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="be-ava-comment">
            </a>
        </div>
        <div class="be-comment-content">
            <span class="be-comment-name">
                <a href="blog-detail-2.html"><?php echo $cname; ?></a>
            </span>
            <span class="be-comment-time">
                <i class="fa fa-clock-o"></i>
                April 9, 2022 at 10:45am
            </span>
            <p class="be-comment-text">
                <?php echo $c_comments ?>
            </p>
        </div>
    </div>
    </tbody>
</table>

</div>

</div>
</div>
</div>      
</div>
<div class = "form-block">
<button name="update_comment">Show more comments</button>
</div>


    <div><br><br><br><br><br><br></div>
<div class="bootstrap-iso">
    <form class="form" id="formz" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onclick="return validateForm(this)"   novalidate >
    <div class = "form-control">
    <div class="form-block">
        <div class="row">        
        <div class="col-xs-12 col-sm-6">
                <div class="form-group fl_icon">
                    <div class=""><i class="fa fa-user"></i></div>
                    <input class="form-input" type="text" name="name" id="fullname" placeholder="Your name">
                    <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
         <span class="error"> <?php echo $nameErr; ?></span>
        <br>
        <small><?php //echo $nameErr; ?></small>
                </div>
            </div>
                
            
            <div class="col-xs-12 col-sm-6 fl_icon">
                <div class="form-group fl_icon">
                    <div class=""><i class="fa fa-envelope-o"></i></div>
                    <input class="form-input" type="text" name="email" id="email" placeholder="Your email">
                    <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
        <span class="error"> <?php echo $emailErr; ?></span> 
        <br>
        <small><?php //echo $emailErr; ?></small>
                </div>
            </div>
            <div><br></div>
            <div class="col-xs-12">                                 
                <div class="form-group fl_icon">
                    <div class=""><i class="fa fa-envelope-o"></i></div>
                    <input class="form-input" type="text" name="commentz" id="commentz" placeholder="Your Comment">
                    <i class = "fas fa-check-circle"></i>
        <i class = "fas fa-exclamation-circle"></i>
         <span class="error"> <?php echo $commentzErr; ?></span> 
        <br>
        <small><?php //echo $commentzErr; ?></small>
                </div>
            </div>
            <div><br></div>
            <button type="submit" id ="sz" name="submit" value="submit" >Comment</button>
        </div>

    <!-- </div> -->
</div>  
</div>
</form>
</div>
</div>
</div>
<div><br><br><br><br></div>
</body>
 <script src= "../views/js/commentz.js"></script>
</html>
 <?php include '../views/include_require/footer.php'; ?>