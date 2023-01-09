const productsElement = document.querySelector(".products-El");
const cartItemsEl = document.querySelector(".cart-items");
const subtotalEl = document.querySelector(".subtotal");

//render products function//
function renderProduct(){
    products.forEach( (product) => {
        productsElement.innerHTML += `
        <div class="container">
        <div class = "itemArea">
            <div class = "itemImg">
            <img src = "${product.imgSrc}" alt = "${product.name}">
                    </div>
                    <div class="desc">
                        <h2>${product.name}</h2>
                        <h2><small>$</small>${product.price}</h2>
                        <p>
                        ${product.description}
                        </p>
                    </div>
                    <div class="addToCart" onclick = "addToCart(${product.id})">
                        <img src="./icons/bag-plus.png" alt="add to wish list">
                    </div>
</div>
</div>`
        ;
    });
}
renderProduct();



//cart array//
let cart = [];



//adding items to Cart//
function addToCart(id){
    if (cart.some((item) => item.id === id)) {
        alert("product already in cart!!")
     } else{
        const item = products.find((product) => product.id === id);
        //console.log(item);
        cart.push({
            ...item,
            numberOfUnits : 1

        });
       //console.log(cart);
        
        }
        updateCart();
    }
   // console.log(id);






   //update cart//
function  updateCart(){
    renderCartItems();
    renderSubtotal();
}




//calculate subtotal//
function renderSubtotal(){
        let totalPrice = 0,
          totalItems = 0;
      
        cart.forEach((item) => {
          totalPrice += item.price * item.numberOfUnits;
          totalItems += item.numberOfUnits;
        });
      
        subtotalEl.innerHTML = `Subtotal (${totalItems} items): $${totalPrice.toFixed(2)}`;
        // console.log(totalItems)
        // console.log(totalPrice)
        


}
//render items to cart lement
function renderCartItems(){
    cartItemsEl.innerHTML = ""; // clear cart element after an input

cart.forEach((item) =>{
    cartItemsEl.innerHTML += `
    <div class="cart-item">
            <div class="item-info"">
                <img src="${item.imgSrc}" alt="${item.name}">
                <h4>${item.name}</h4>
            </div>
            <div class="unit-price">
                <small>$</small>${item.price}
            </div>
            <div class="units">
                <div class="btn minus" onclick="changeNumberOfUnits('minus', ${item.id})">-</div>
                <div class="number">${item.numberOfUnits}</div>
                <div class="btn plus" onclick="changeNumberOfUnits('plus', ${item.id})">+</div>           
            </div>
        </div>
    `
})
}


//Remove from cart function//
function removeItemFromCart(id) {
    cart = cart.filter((item) => item.id !== id);
  
    updateCart();
  }


  //Cahange number of units//
function changeNumberOfUnits(action, id){
cart = cart.map((item) => {
let numberOfUnits = item.numberOfUnits;
    if (item.id === id) {
        if (action === "minus" && numberOfUnits > 1) {
          numberOfUnits--;
        } else if (action === "plus" && numberOfUnits < item.instock) {
          numberOfUnits++;
        }
      }   

      return {
        ...item,
        numberOfUnits,
      };
   
});
updateCart();
}

/* let genBtn = document.getElementById("gobtn")
    let totalPrice = 0,
          totalItems = 0;
      
        cart.forEach((item) => {
          totalPrice += item.price * item.numberOfUnits;
          totalItems += item.numberOfUnits;
        });
      

        let qrData =  totalPrice
        console.log(totalPrice)
        let qrCode = new QRCode(document.getElementById("qrcode-el"), {
            text:"SS-POS",
            width: 128,
            height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
            
        });
        genBtn.addEventListener("click", () => {
            qrCode.makeCode(qrData)
            }) */
        


            function generate(){

                let totalPrice = 0,
                totalItems = 0;
            
              cart.forEach((item) => {
                totalPrice += item.price * item.numberOfUnits;
                totalItems += item.numberOfUnits;
              });

               /*  let qrData = totalPrice
                let qrData2 = totalItems */
                let qrData = " Your items: " + totalItems + " Your total is: "
                +totalPrice +" thanks for using SS-POS GOODBYE!!!"
                var qrCode = new QRCode(document.getElementById("qrcode-el"), {
                width: 250,
                height: 250,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
            
                
                qrCode.makeCode(qrData)
                
            }











    // console.log(totalPrice)


