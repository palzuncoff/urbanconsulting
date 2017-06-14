function randomRgb(min, max) {
	var r = Math.floor(Math.random() * (max - min)) + min;
	var g = Math.floor(Math.random() * (max - min)) + min;
	var b = Math.floor(Math.random() * (max - min)) + min;
	var value = r+", "+g+", "+b;
	return value;
	alert(value);
}
function random(min, max) {
	return Math.floor(Math.random() * (max - min)) + min;
}
function getCount() {
	var x = random(0, 5);
	for (var i = 0; i <= x; i++) {
		gradient = +"rgba("+randomRgb(0, 256)+","+Math.random()+") "+random(0,101)%+",";
	}
}


//$(".container").css('background-color', 'rgb('+randomRgb(0, 255)+')');

var x = document.querySelectorAll(".container"); 
x.forEach(function(i) { 
i.style.background = "linear-gradient("+random(0, 360)+"deg, rgba("+randomRgb(0, 255)+","+Math.random()+") 0%, rgba("+randomRgb(0, 255)+",1) 51%, rgba("+randomRgb(0, 255)+",1) 100%)"; 
});