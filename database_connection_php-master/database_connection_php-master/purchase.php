<?php
include 'admin_Conn2.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($connection,"DELETE FROM `items4` WHERE`id`='$id'");
}
$select = "SELECT * FROM items4";
$query = mysqli_query($connection,$select);

$select = "SELECT * FROM user_form";
$q
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
		<a href = "qrGen.php"><button>Accounts</button></a>
	</header>
    <div class = "br">
		<p></p>
	</div>
<div class = "table_area">
        <div class = "UserAccounts">

            <h2>Purchases Records</h2>
             <!--Search Bar php-->
            <div class = "search-el">
                
            <form method = "post">      
            <h4>Search</h4>

            <input type = "text"  name = "search" placeholder = "Search  Data" id = "searchData-el">
            <button name= "submit"  id = "searchBtn">Search</button>
            </form>

            <!--Results table-->
            <table class = "searchTable">
                
                <?php
                if(isset($_POST['submit'])){
                    $search2 = $_POST['search'];

                    $sql = "SELECT * FROM `items4` where `id` ='$search2' or `productsBought` = '$search2' ";
                    $result2 = mysqli_query($connection,$sql);
                    if($result2){
                       if(mysqli_num_rows($result2) > 0){
                        echo '<thead>
                        <tr>
                        <th>Purchase ID</th>
                        <th>Purchase Amount</th>
                        <th>Time Stamp</th>
                        </tr>
                        </thead>
                        ';
                        $row = mysqli_fetch_assoc($result2);
                        echo '<tbody>
                        <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['productsBought'].'</td>
                        <td>'.$row['timin'].'</td>
                        </tr>
                        </tbody>';

                       }else{
                        echo '<h2 class = "">Record Not Found</h2>';

                       }
                    }


                }

                    ?>

                 
            </table>
            
        </div>
        <div class = "br">
		<p></p>
	</div>

        <div class = "outer-wrap">
            <div class = "table-wrap">
         <table border = "2" cellpadding= "0">
            <tr>
                <th>Purchase ID</th>
                <th>Purchase Amount</th>
                <th>Purchase time</th>
                <th>Opreation</th>
            </tr>
           <?php
           $num = mysqli_num_rows($query);
           if ($num > 0) {
            while ($result = mysqli_fetch_assoc($query)){
                echo "
                <tr>
                <td>".$result['id']."</td>
                <td>".$result['productsBought']."</td>
                <td>".$result['timin']."</td>
                
                <td>
                     <a href = 'purchase.php?id=".$result['id']."' class = 'removeBtn'>Delete</a>
                
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
		<h5> Developed By</h5>
		<h4>Brian N Waiganjo</h4>
		<h6>202053164</h6>
	</footer>
</html>
<script src = "JS/sspos.js"></script>
</body>
</html>