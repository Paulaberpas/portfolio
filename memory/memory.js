
// Handle selection of buttons
function selectMe(el){

	siblings = el.parentElement.children;
	for(var i =	0; i < siblings.length; i++){
		siblings[i].classList.remove('selected');
		if(siblings[i] == el){
			siblings[i].classList.add('selected');
		}
	}
}

// Create object with default game settings
var gameSettings = {
	"size": 4,
	"type": 1,
}

//Set game type
function setGameType(type){
	gameSettings["type"] = type;
}

// Set game size
function setGameSize(size){
	gameSettings["size"] = size;
}


// handle start 
var totalCouples;
function startGame(){ 

	var type = gameSettings["type"];
	var size = gameSettings["size"];
	totalCouples = size * size / 2;

	// create board and start counter and timer
	createBoard(totalCouples);
	counter(0);
	if (type == 1){
		bestTimeTimer();
	}else{
		countdownTimer()
	}

}			

// handle create board depending on total number of couples(size)	
function createBoard(totalCouples){ 
	var size = gameSettings["size"];	

	// empty de container		
	var node = document.getElementById("container");
	while (node.firstChild){
		node.removeChild(node.firstChild);
	}
	
	document.getElementById("container").style.paddingTop = 0;
	document.getElementById("container").style.backgroundColor = "white";

	//get array of images 
	var clickableImages = giveBackgrounds(totalCouples);

	// create cards, add necessary classes and id
	for (var i = 0; i < size * size; i++){
		var card = document.createElement("div");
		node.appendChild(card);
		card.classList.add("card");
		card.classList.add("closed");
		card.id = "card_" + i;

		// add onclick event to every card to be able to flip it
		card.onclick=function() {flipcard(this)};
		
		// give an image from the array to the card
		document.getElementById("card_" + i).style.backgroundImage = "url(" + clickableImages[i] +")";

		// To get responsive size cards
		var ratio = 100 / size;
		var cardSize =  "calc(" + ratio + "% - 18px)";
		card.style.width = cardSize;
		// if height would be iqual to cardSize, cardSize in this case would be a % 
		// of the height so not iqual to width and not square
		// iqual height to width in pixels
		$('.card').height($('#card_1').innerWidth());
	}		
}

// Counter starts at 0 and adds 1 everytime it's call
var couples = 0;
function counter(x){
	couples = couples + x;
	document.getElementById("counter").innerHTML = "Couples: " + couples;
	if(couples == totalCouples){
		window.clearInterval(timer);	
	}
}


// Timers 
var msec = 0;
var sec = 0;
var min = 0;
var timer;

// the timer is an interval that calls the function clock, time in msec
function bestTimeTimer(){
	timer = window.setInterval(clock, 1000); 
}

// set interval backwards, clear interval at the end		
function countdownTimer(){
	var seconds_left = 10;
	var interval = setInterval(function() {
		document.getElementById("timer").innerHTML = --seconds_left + " s";	
		console.log(seconds_left);		  
		if (seconds_left == 0) {
			document.getElementById('timer').innerHTML = 'Time over!';
			window.clearInterval(interval);
		}
	}, 1000);
	document.getElementById("timer").style.border = "2px solid black";
}


// forwards
function clock() {
	msec += 1;
	if (msec == 60) {
		sec += 1;
		msec = 0;
	}
	if (sec == 60) {
		sec = 0;
		min += 1;	
	}
	str_min = min;
	if (str_min < 10){
		str_min = "0" + str_min;
	}
	str_sec = sec;
	if (str_sec < 10){
		str_sec = "0" + str_sec; 
	}
	str_msec = msec;
	if (str_msec < 10){
		str_msec = "0" + str_msec; 
	}
	time = str_min + ":" + str_sec + ":" + str_msec; 

	document.getElementById("timer").innerHTML = time;
	document.getElementById("timer").style.border = "2px solid black";
}

// take the correct number of images from the inicial  array, make them double, put them together and shuffle them
function giveBackgrounds(numberImages){
	// create array of images
	var cardImages = ["images/1.png","images/2.png","images/3.png","images/4.png","images/5.png","images/6.png","images/7.png","images/8.png","images/9.png","images/10.png","images/11.png","images/12.png","images/13.png","images/14.png","images/15.png","images/16.png","images/17.png","images/18.png"];

	var neededImages = cardImages.slice(0,numberImages);
	var copyneededImages = [...neededImages];
	var allImages = neededImages.concat(copyneededImages);

	var clickableImages;
	clickableImages = shuffle(allImages);
	
	return clickableImages;
}


function shuffle(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}

// handle flipping when onclick
function flipcard(card){
	// get cards that are already clicked
	var clickedCards = document.getElementsByClassName("clicked");

	// if 0 or 1
	if (clickedCards.length <= 1){

		// if the current card is not done and not clicked add class clicked and remove closed
		if ((!card.classList.contains("done") && !card.classList.contains("clicked"))){
			card.classList.add("clicked");
			card.classList.remove("closed");

			// if there are two cards clicked check if they are a couple
			if (clickedCards.length > 1){
				if(clickedCards[0].style.backgroundImage == clickedCards[1].style.backgroundImage){
					//add one to the counter, add class done and remove clicked
					counter(1);
					clickedCards[0].classList.add("done");
					clickedCards[1].classList.add("done");
					clickedCards[1].classList.remove("clicked");
					clickedCards[0].classList.remove("clicked");
				}else{
					// if not, close cards back + time msec
					window.setTimeout(closeCards, 1000);
				}
			}
		}	
	}
}

// to close the cards back give them the class closed and remove clicked
function closeCards(){
	clickedCards = document.getElementsByClassName("clicked");
 	clickedCards[0].classList.add("closed");
	clickedCards[1].classList.add("closed");
	clickedCards[1].classList.remove("clicked");
	clickedCards[0].classList.remove("clicked");				
}


