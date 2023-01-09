<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS\profile.css">

   <title>login</title>

   <!-- custom css file link  -->

</head>
<header>
		<!-- <img class = "logoImg"src = "CSS\cover.png"><br> -->
		<h1>SELF SERVICE POINT OF SALE</h1>
		<!-- <a  href = "">LINK001</a>
		<a  href = "">LINK002</a> -->
		<a href = "register.php"><button>SIGN UP</button></a>
		<a href = "index.php"><button>INDEX</button></a>
	</header>
  <div class = "br">
		<p></p>
	</div>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
   <img src ="icons\login.png">
      <h3>LOG IN HERE &#128071</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">&#128681 '.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required><br>
      <input type="password" name="password" placeholder="enter password" class="box" required><br>
      <input type="submit" name="submit" value="login now" id="submitbtn">
     
   </form>
   <p>Don't have an account? &#11015<a href="register.php"><button id = "register-btn">Register Now</button></a></p>

</div>
<footer>
		<h5>Develped By</h5>
		<h4>Brian N Waiganjo</h4>
		<h6>202053164</h6>
	</footer>
</body>
</html>