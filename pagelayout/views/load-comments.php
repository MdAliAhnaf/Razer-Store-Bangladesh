
<?php
require '../model/DB.php';
$commentNewCount=$_POST['commentNewCount']; 
$count=0;
$count=$count + $commentNewCount;                    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>


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
            $queryID = "SELECT * FROM comments_section ORDER BY Idc DESC limit $commentNewCount";
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



    <!-- <div class="be-comment">
        <div class="be-img-comment">    
            <a href="blog-detail-2.html">
                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="be-ava-comment">
            </a>
        </div>
        <div class="be-comment-content">
            <span class="be-comment-name">
                <a href="blog-detail-2.html">Cüneyt ŞEN</a>
            </span>
            <span class="be-comment-time">
                <i class="fa fa-clock-o"></i>
                May 27, 2015 at 3:14am
            </span>
            <p class="be-comment-text">
                Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant
            </p>
        </div>
    </div> -->
    <div><br><br><br><br><br><br></div>
</div>
</div>
</body>
</html>
