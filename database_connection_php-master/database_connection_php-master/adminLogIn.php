<?php

include 'adminconfig.php';
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    
    $select = mysqli_query($conn, "SELECT * FROM `admin_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:qrGen.php');
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
    <title>Admin Log In</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
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
</body>
</html>
