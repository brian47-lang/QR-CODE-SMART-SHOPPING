let sumT = 0;
// This array contains all items scanned ie all the itemArr
let items = [];

let letters = "abcdefghijklmopqrsdtuvwxyz";
let numerals = "0123456789"
let itemsInBasket = 0;
let itemlist = document.getElementById("shopItems-el")//HTML element where the items will be added
let pricelist = document.getElementById("priceItems-el")//HTML element where the items will be added

let shoppingT = document.getElementById("shoppingTable")
let shoppingBasket = document.getElementById("itemInCart")

   //QR Scanner Function//
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {

        let itemArr = "";
        let priceArr = "";
      for(let i = 0; i<content.length; i++){

        if(letters.includes(content[i])===true){
          itemArr+=content[i];

        }else if (numerals.includes(content[i])===true){
          priceArr+=content[i]
        }
        
      }
      //  The code below converts string to Integer
     priceItems = parseInt(priceArr)
     sumT += priceItems
  //items counter//
   itemsInBasket += 1;
      shoppingT.innerHTML += "<td>" + itemArr + "</td>" + "<td>"  + priceArr  +  "</td>"
     


     //These Function deletes a items from a the cart
     

var index, table =  document.getElementById("shoppingTable")
cells = table.getElementsByTagName('td')

for (var i = 0, len = cells.length; i < len; i++) {
  cells[i].onclick = function () {
    let delPrice = this.innerHTML
    sumT = sumT - delPrice;
    document.getElementById("text").value=sumT;
    index = this.parentElement.rowIndex;     
     table.deleteRow(index);
     itemsInBasket-=1;
     shoppingBasket.textContent = itemsInBasket
     budget();
  };
}
//Displays the total number of items in cart
shoppingBasket.textContent = itemsInBasket

console.log(itemsInBasket)
    //Sends and displays value of the total cost to the database  and textbox//
    document.getElementById("text").value=sumT;

    budget();

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




//This function generates and renders the budget for the user//
//let budgetInput = document.getElementById("budgetInput").value
function budget(){
amountTB = document.getElementById("amountToBudget")


    if (document.getElementById("budgetInput").value == ""){
      amountTB.textContent= "No Budget Limit Set "

  } else if (document.getElementById("budgetInput").value > sumT) {
    amountTB.textContent= "Amount to budget Limit N$:"+(document.getElementById("budgetInput").value - sumT)

  } else if (document.getElementById("budgetInput").value < sumT ){
    alert("Budget Limit Exceeded!!!")
    amountTB.textContent = "budget limit Exceeded!! by N$: " + (sumT - document.getElementById("budgetInput").value ) 

  } else if (document.getElementById("budgetInput").value == sumT ){
    alert("Budget Limit Reached!!!")
    amountTB.textContent = "Budget limit Reached!!" 
  }
  // } else {
  //   amountTB.textContent= " Budget Limit Set!! " 
  // }

}

budgeBtn = document.getElementById("budgetBtn-el")
budgeBtn.addEventListener("click", budget)

  
       

       