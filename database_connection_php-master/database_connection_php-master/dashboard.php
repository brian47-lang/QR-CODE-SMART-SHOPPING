
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
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Dashboard</title>

</head>
<body>
<header>
		<!-- <img class = "logoImg"src = "CSS\cover.png"><br> -->
		<h1>SELF SERVICE POINT OF SALE</h1>
		<!-- <a  href = "">LINK001</a>
		<a  href = "">LINK002</a> -->
		<!-- <a href = "store.php"><button>STORE</button></a> -->
		<a href = "profile.php"><button>PROFILE</button></a>
		<a href = "scannerTest.php"><button>SHOP</button></a>
		<a href="login.php"><button id = "logoutBtn">Logout</button></a>
	</header>
	<div class = "br">
		<p></p>
	</div>
<section class= "container ">
		<div class = "CARD">
			<div class = "cardImg CARD-1">
			</div>
			<h2>SHOP</h2>
			<p>SS-POS was developed to<br>
			addresses challenges faced by the traditional system </br>
			User starts by creating an account with SS-POS</br>
		inorder to use the system.The system is helps customer have a better<br>
	shopping experience </p>
		</div>
		<div class = "CARD" >
		<div class = "cardImg CARD-2">
		<a href = scannerTest.php></a>
			</div>
			<h2>SCAN</h2>
			<p>Aftewr user creates account withh SS-POS via the user dashboard<br>
		the user gets access to the scanner where users scan product</br>
	and they are added automatically to the virtual shopping cart</br>
which dispalys the product price and name<br>
users are able to set budget limits aswell to limit overpending</p>
		</div>
		<div class = "CARD">
		<div class = "cardImg CARD-3">
			</div>
			<h2>GO!!</h2>
			<p>After scaning your productys user is able to pay directly via device<br>
		using digital payment methoids like visa<br>
	after which a custoimer is issued a Qr reciept which can be checked and used for proff of purchase<br>
Save time,save money</p>
		</div>

</section>

</body>
<footer>
		<h5>By</h5>
		<h4>Brian N Waiganjo</h4>
		<h6>202053164</h6>
	</footer>
</body>
</html>