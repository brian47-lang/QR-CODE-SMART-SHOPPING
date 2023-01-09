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
    <script src = "qrcode.min.js"></script>
    <link rel="stylesheet" href="CSS\reciept.css">

    <title>Qr Reciept</title>
</head>

<body>
<header>
		<!-- <img class = "logoImg"src = "CSS\cover.png"><br> -->
		<h1>SELF SERVICE POINT OF SALE</h1>
		<!-- <a  href = "">LINK001</a>
		<a  href = "">LINK002</a> -->
		<a href = "scannerTest.php"><button>SHOP</button></a>
		<a href = "dashboard.php"><button>HOME</button></a>
	</header>
  <div class = "br">
		<p></p>
	</div>
<div class  ="qrReciept">
<div id="qrReciept-el"><p id = "qrPara">CLICK TO GET YOUR QR RECIEPT &#11015</p><br> 
<button id = "genQr-el" onclick="generateQr()">Get qr</button>
</div> 
</div>

<script>
  
    function generateQr(){
       // let itemPurchased = JSON.parse(localStorage.getItem("itemsBought"));
        
      //  let costOfItems = JSON.parse(localStorage.getItem("purchaseToTal"));
        
        let qrData ="Account ID:  <?php echo $_SESSION['user_id']; ?> Thank you  for shopping with us " + " Total cost N$ :" + 
        JSON.parse(localStorage.getItem("purchaseToTal")) + " for items: " + JSON.parse(localStorage.getItem("itemsBought"))

        var qrCode = new QRCode(document.getElementById("qrReciept-el"), {
            width: 400,
            height: 400,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
        qrCode.makeCode(qrData);



    }
    </script>
</body>
<footer>
		<h5>By</h5>
		<h4>Brian N Waiganjo</h4>
        <h6>202053164</h6>
	</footer>
</html>
