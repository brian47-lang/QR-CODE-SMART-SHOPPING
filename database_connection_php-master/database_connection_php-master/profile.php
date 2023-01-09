<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
 };

 if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
 }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS\viewProf.css">

   <title>Profile</title>

    <!-- custom css file link  -->
  

</head>
<header>
		<!-- <img class = "logoImg"src = "CSS\cover.png"><br> -->
		<h1>SELF SERVICE POINT OF SALE</h1>
		<!-- <a  href = "">LINK001</a>
		<a  href = "">LINK002</a> -->
		<a href = "dashboard.php"><button>HOME</button></a>
		<a href = "index.php"><button>INDEX</button></a>
	</header>
  <div class = "br">
		<p></p>
	</div>
<body>
    <div class = "container">
<div class="profile">
      <?php
      //this code renders the image uploaded by user  while creating account//
      //if no image is created while creating account by user//
      //deafult avatar user pic will be rendered//
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h1><?php echo $fetch['name']; ?></h1>
      <!--fetch username-->
      <a href="update_profile.php" class="btn"><button id = "updtBtn">UPDATE PROFILE</button></a>
      <a href="login.php?logout=<?php echo $user_id; ?>" class="delete-btn"><button id = "updtBtn">LOGOUT</button></a>
      <p>new <a href="login.php"><button id = "updtBtn">LOGIN</button></a> or <a href="register.php"><button id = "updtBtn">REGISTER</button></a></p>
   </div>
        </div>
        <footer>
		<h5>Develped By</h5>
		<h4>Brian N Waiganjo</h4>
		<h6>202053164</h6>
	</footer>
</body>
</html>
