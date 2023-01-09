
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
<html>
  <head>
    <title>Instascan</title>
    <meta charset="UTF-8">
    <script type="text/javascript" src="instascan.min.js"></script>
    <link rel="stylesheet" href="CSSsc\stylesScanner.css">
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

  <section class ="scanContainer">

    <div class = "containerA">
      <video id="preview" width = "380"></video>
      <div class = "scanHere">
          </div>
    </div> 
    
    <div class =  "budget">
      <h3>Shop with a budget limit &#128076</h3><br>
      <h4>Set a budget limit here &#11015</h4>
      <!-- <p id = "yesBudget"></p> -->

      <input type="text" id = "budgetInput" placeholder = "Enter Budget limit"><br>

      <button id = "budgetBtn-el">Set Budget</button><br>
      <span id = "amountToBudget"></span>

      <!-- <img src = "icons\budget.png"> -->
      <div class = "budgetImg">
      <img src = "icons\budget.png">
</div>
</div> 


    <div class  = "containerB"  id = "budgetClassId">

      <h3 align = "center">SHOPPING CART<img src = "icons\bag.png"></h3>

          <!-- THis Table contaiunts items and prices added in the virtual cart -->
        <!-- <ul id = "shopItems-el"><img src = "img\addcart2.png"></ul> -->
        <div class = "outer-wrapper">
          <p>
        <img id = "cartImg" src  = "icons\cart.png">
        ITEMS IN CART: <span id  = "itemInCart"></span>
      </p>
          <div class = "table-wrapper">
        <table id = "shoppingTable">
          <tr>
            <th>ITEM<img src = "icons\add-item-icon.png"></th>
            <th>PRICE <img src = "icons\item.png"></th>
          </tr>
          <tr>
      </tr>
      </table>
      </div>
      </div>

       <!-- This form sends items in the cart to the database -->
       <form action = "insert.php" method = "post" id = "item">
       <input type="text" name = "text" id = "text" placeholder = "Totals will show here!!" readonly>
      
        <!--<label id ="text">Totals:</label>-->
       <button type = "submit" id = "submit" onclick = "proceed()">Procced to payment</button>

       <!-- The script below prompts for a confirmation from the user -->
       <script>
         function proceed(){
        var result = confirm('Are you sure proceed to ckeckout');
        if(result == false){
          event.preventDefault();
          
        }
        var totalPurchase =  document.getElementById("text").value
        var items = document.getElementById ( "shoppingTable" ).innerText
          window.localStorage.setItem('purchaseToTal', JSON.stringify(totalPurchase));
          window.localStorage.setItem('itemsBought', JSON.stringify(items))
      }
      </script>
  </form>



    </div>
    <!-- <div class = "containerC">
    <h3>COSTS</h3>
    <ol id = "priceItems-el">PRICE</ol>
   
</div> -->
  
</section>
<div class = "br">
		<p></p>
	</div>
    <footer>
		<h5>By</h5>
		<h4>Brian N Waiganjo</h4>
    <h6>202053164</h6>
	</footer>
  <script src = "JS/scanner.js"></script>
  </body>
 
</html>




<!-- <script type="text/javascript">
   let sumT = 0;
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
		/* let list = document.getElementById("shopcart-el")
		  list.innerHTML += "<li>" + content + "</li>" */
      let itemlist = document.getElementById("shopItems-el")
      let pricelist = document.getElementById("priceItems-el")
      let sumTotal = document.getElementById("sumTotal-el")

        //this variable contains all alphabets to sought from
      let letters = "abcdefghijklmopqrsdtuvwxyz";
      //this variable contains all numerals to sought from
      let numerals = "0123456789"
      //after the includes operation relevant data types from the qr codes will concatitanated
      //to the ethier pricelist for int data types
      //and itemlist for string types.
        let itemArr = "";
        let priceArr = "";
        
         

      for(let i = 0; i<content.length; i++){
        if(letters.includes(content[i])===true){
          //itemlist.innerHTML += "<li>" + content[i] + "</li>">
          //itemArr.push(content[i]);
          itemArr+=content[i];
        }//else if (numerals.includes(content[i])===true){
          //pricelist.innerHTML += "<li>" + content[i] + "</li>"
          //priceArr.push(content[i]);
        
        // priceArr.push(content[i]);
          
        else{
          priceArr+=content[i];
        }
        
      }
      itemlist.innerHTML += "<li>" + itemArr + " " + priceArr + "</li>" //+" <button id = "remove()">Del</button>"
      // pricelist.innerHTML += "<li>" + priceArr + "</li>"

     priceItems = parseInt(priceArr)
      sumT += priceItems
    //  sumTotal.textContent = sumT; 
    document.getElementById("text").value=sumT;
    document.forms[0].submit
      console.log(sumT)



      var itemlistI = document.querySelectorAll("#shopItems-el li"),
      tab = [], index;

      
for (var i =0; i<itemlistI.length; i++){
  tab.push(itemlistI[i].innerHTML);
}

for(var i = 0; i < itemlistI.length; i++){
                 
                 itemlistI[i].onclick = function(){
                     liIndex = tab.indexOf(this.innerHTML);
                     console.log(this.innerHTML + " INDEX = " + index);
                     // set the selected li value into input text
                    // inputText.value = this.innerHTML;
                 };
                 
             }
             function remove(){
              
  itemlistI[liIndex].parentNode.removeChild(itemlistI[liIndex]);
  sumT = sumT - priceArr
 // sumTotal.textContent = sumT;
 document.getElementById("text").value=sumT;
}
document.getElementById("delete-el").addEventListener("click", remove);

//DB//










      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
      
    </script>
    -->