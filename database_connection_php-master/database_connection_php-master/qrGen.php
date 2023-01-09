<?php
// users php
include "admin_Conn.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($connection,"DELETE FROM `user_form` WHERE`id`='$id'");
}


$select = "SELECT * FROM user_form";
$query = mysqli_query($connection,$select);

//

?>
<html lang="en">
<head>
<meta charset="UTF-8">
 <!--this is js library for  qr codes-->
 <script src = "qrcode.min.js"></script>
 <link rel="stylesheet" href="CSSgn\stylesGen.css">
</head>
<body>
<header>
		<!-- <img class = "logoImg"src = "CSS\cover.png"><br> -->
		<h1>SELF SERVICE POINT OF SALE</h1>
		<!-- <a  href = "">LINK001</a>
		<a  href = "">LINK002</a> -->
		<!-- <a href = "scannerTest.php"><button>SHOP</button></a> -->
		<a href = "purchase.php"><button>Purchases</button></a>
	</header>

    <section class = "qrArea">
        <div class = "qrArea1">
            <input type = "text" id = "qr-data" placeholder = "Enter Item">
            <button id = "generate-el" >GENERATE</button>
        </div>
        <div class = "qrArea2">
            <br>
            <div id="qrcode-el">QR CODE &#11015 </div>
        </div>
    </section>
    <div class = "br">
		<p></p>
	</div>
<div class = "table_area">
        <div class = "UserAccounts">

            <h2>User Accounts</h2>
             <!--Search Bar php-->
            <div class = "search-el">
                
            <form method = "post">      
            <h4>Search</h4>

            <input type = "text" id = "searchBar"placeholder = "Search  Data" name = "search">
            <button name= "submit" id = "searchBtn">SEARCH</button>
          

            <!--Results table-->
            <table class = "searchTable">
                
                <?php
                if(isset($_POST['submit'])){
                    $search2 = $_POST['search'];

                    $sql = "SELECT * FROM `user_form` WHERE `id` like '%$search2%'
                    OR  `name` like '%$search2%' OR `email` like '%$search2%'";
                    $result2 = mysqli_query($connection,$sql);
                    if($result2){
                       if(mysqli_num_rows($result2) > 0){
                        echo '<thead>
                        <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User email</th>
                        </tr>
                        </thead>
                        ';
                        while($row = mysqli_fetch_assoc($result2)){
                        echo '<tbody>
                        <tr>
                        <td><a href = "SearchData.php?data='.$row['id'].'">'.$row['id'].'</a></td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['email'].'</td>
                        </tr>
                        </tbody>';
                        }
                       }else{
                        echo '<h2 class = "">Record Not Found</h2>';

                       }
                    }


                }

                    ?>

                 
            </table>
            </form>
        </div>
        <div class = "br">
		<p></p>
	</div>
        <div class = "outer-wrap">
            <div class = "table-wrap">
         <table border = "2" cellpadding= "0">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Image</th>
                <th>Opreation</th>
            </tr>
           <?php
           $num = mysqli_num_rows($query);
           if ($num > 0) {
            while ($result = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                <td>".$result['id']."</td>
                <td>".$result['name']."</td>
                <td>".$result['email']."</td>
                <td>".$result['password']."</td>
                <td>".$result['image']."</td>
                <td>
                     <a href = 'qrGen.php?id=".$result['id']."' class = 'removeBtn'>Delete</a>
                
                </td>
                </tr>
                ";
            }
           }

           ?>
          
            </table>
        </div>
        </div>
           <div class = "productBought">
         


        </div>
 </div>

 <br>
<footer>
		<h5>By</h5>
		<h4>Brian N Waiganjo</h4>
	</footer>
</html>
<script src = "JS/sspos.js"></script>
</body>
</html>