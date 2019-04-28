var msginp;
var codeinp;

var tgler;

function setup() {
	noCanvas();
}

function draw() {
	msginp = document.getElementById("message").value;
	codeinp = document.getElementById("code").value;
	tgler = document.getElementById("toggler").checked;
}

function crypt() {
	console.log('message: '+msginp);
	console.log('code: '+codeinp);
	console.log('crypt :'+tgler);

	if (tgler === true){
		document.getElementById("message").value = "";
	}else {
		document.getElementById("message").value = "decrypted";
	}

}
