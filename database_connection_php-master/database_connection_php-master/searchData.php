<?php
include 'admin_Conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data</title>
</head>
<body>
    <?php
     $data = $_GET['data'];

     $sql = "SELECT * FROM `user_form` WHERE `id`= $data";
     $result = mysqli_query($connection,$sql);
     
     if($result){
        $row = mysqli_fetch_assoc($result);
        echo'
         <div class = "searcgDataBox">
         <h3>User Name: '.$row['name'].'</h3>
         <h3>User Email: '.$row['email'].'</h3>
         <h3>Profile Pic: '.$row['image'].'</h3>
         <h3>User Password: '.$row['password'].'</h3>


         </div>';
     } 



    ?>
</body>
</html>