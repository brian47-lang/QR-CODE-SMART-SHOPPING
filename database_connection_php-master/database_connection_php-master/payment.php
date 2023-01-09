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
    <link rel="stylesheet" href="payCss\payCSS.css">

    <title>payment</title>
    <style>
      
      
        </style>
</head>
<header>
		<!-- <img class = "logoImg"src = "CSS\cover.png"><br> -->
		<h1>SELF SERVICE POINT OF SALE</h1>
		<!-- <a  href = "">LINK001</a>
		<a  href = "">LINK002</a> -->
		<a href = "scannerTest.php"><button>SHOP</button></a>
		<a href = "dashboard.php"><button>HOME</button></a>
	</header>
<body>
<div class = "br">
		<p></p>
	</div>
    

<div class="container">

    <form action="qrReciept.php">
    <div class = "renderArea">
<h2>ACCOUNT ID: <?php echo $_SESSION['user_id']; ?></h2>
<p>Your purchases : </p><p id ="items-el"></p><br>
<p>Your total N$: </p><span id ="pay-el"></span>
<script>
 document.getElementById("pay-el").innerHTML = JSON.parse(localStorage.getItem("purchaseToTal"));
 document.getElementById("items-el").innerHTML = JSON.parse(localStorage.getItem("itemsBought"));
//console.log(localStorage.getItem("itemsBought"))


</script>
</div>
        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="john deo">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="mumbai">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="india">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" maxLength = "4" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="Get QR reciept"  class="submit-btn">

    </form>

</div>  





</body>

<footer>
		<h5>By</h5>
		<h4>Brian N Waiganjo</h4>
        <h6>202053164</h6>
	</footer>
</html>
