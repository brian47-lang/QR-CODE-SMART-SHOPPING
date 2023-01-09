//METHOD ONE using an onclick function//
/* function generate(){
	let qrData = document.getElementById("qr-data")
	let genBTn = document.getElementById("generate-el")
	var qrCode = new QRCode(document.getElementById("qrcode-el"), {
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

	let input = qrData.value
	qrCode.makeCode(input)
	
} */
//METHOD 2 using Event handler//
let qrData = document.getElementById("qr-data")
let genBtn = document.getElementById("generate-el")
let qrCode = new QRCode(document.getElementById("qrcode-el"), {
	text:"SS-POS",
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});
genBtn.addEventListener("click", () => {
	let input = qrData.value
	qrCode.makeCode(input)
	})

