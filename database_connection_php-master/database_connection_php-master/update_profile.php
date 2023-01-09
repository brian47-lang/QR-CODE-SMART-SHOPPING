<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS\uptProf.css">
   <title>update profile</title>

   <!-- custom css file link  -->
</head>
<header>
		<!-- <img class = "logoImg"src = "CSS\cover.png"><br> -->
		<h1>SELF SERVICE POINT OF SALE</h1>
		<!-- <a  href = "">LINK001</a>
		<a  href = "">LINK002</a> -->
		<a href = "dashboard.php"><button>HOME</button></a>
		<a href = ".php"><button id = "logutBtn">INDEX</button></a>
	</header>
  <div class = "br">
		<p></p>
	</div>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
 
 
      <?php
      //this code renders the avatar/user image
      //if user didnt set image while creating account deafualt image will be rendered
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
         <div class = "updateForm">
    <form action="" method="post" enctype="multipart/form-data">
    <h3 align = "center">Update Profile</h3>
            <span>Username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box"><br>
            <span>email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box"><br>
            <span>Update profile pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box"><br>
      
     
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box"><br>
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box"><br>
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box"><br>
     

      <input type="submit" value="update profile" name="update_profile" class="btn" id = "updateBtn">
      <a href="profile.php" class="delete-btn">go back</a>
   </form>
      </div>
</div>
<footer>
		<h5>Develped By</h5>
		<h4>Brian N Waiganjo</h4>
		<h6>202053164</h6>
	</footer>
</body>
</html>