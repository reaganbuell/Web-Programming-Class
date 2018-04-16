/*
 Define variables for the values computed by the grabber event 
 handler but needed by mover event handler
*/
var diffX, diffY, theElement;


// The event handler function for grabbing the word
function grabber(event) {

    // Set the global variable for the element to be moved

    theElement = event.currentTarget;

    // Determine the position of the word to be grabbed,
    //  first removing the units from left and top

    var posX = parseInt(theElement.style.left);
    var posY = parseInt(theElement.style.top);

    // Compute the difference between where it is and
    // where the mouse click occurred
    diffX = event.clientX - posX;
    diffY = event.clientY - posY;

    // Now register the event handlers for moving and
    // dropping the word

    document.addEventListener("mousemove", mover, true);
    document.addEventListener("mouseup", dropper, true);

    // Stop propagation of the event and stop any default
    // browser action

    event.stopPropagation();
    event.preventDefault();

}  //** end of grabber

// *******************************************************

// The event handler function for moving the word

function mover(event) {
    // Compute the new position, add the units, and move the word

    theElement.style.left = (event.clientX - diffX) + "px";
    theElement.style.top = (event.clientY - diffY) + "px";

    // Prevent propagation of the event

  event.stopPropagation();
}  //** end of mover

// *********************************************************
// The event handler function for dropping the word

function dropper(event) {

    // Unregister the event handlers for mouseup and mousemove

    document.removeEventListener("mouseup", dropper, true);
    document.removeEventListener("mousemove", mover, true);

    // Prevent propagation of the event

    event.stopPropagation();
}  //** end of dropper

function randomSet(){
    // Pick a number randomly 1-3
    var randomNum = Math.floor(Math.random() * 3) + 1;
    var arr = ["<img src='./puzzle/img"+randomNum+"-4.jpg' id='pic1' style = 'position: absolute; top: 549px; left: 520px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-7.jpg' id='pic2' style = 'position: absolute; top: 549px; left: 624px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-10.jpg' id='pic3' style = 'position: absolute; top: 549px; left: 728px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-5.jpg' id='pic4' style = 'position: absolute; top: 549px; left: 832px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-2.jpg' id='pic5' style = 'position: absolute; top: 549px; left: 936px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-11.jpg' id='pic6' style = 'position: absolute; top: 549px; left: 1040px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-12.jpg' id='pic7' style = 'position: absolute; top: 653px; left: 520px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-1.jpg' id='pic8' style = 'position: absolute; top: 653px; left: 624px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-8.jpg' id='pic9' style = 'position: absolute; top: 653px; left: 728px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-6.jpg' id='pic10' style = 'position: absolute; top: 653px; left: 832px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-3.jpg' id='pic11' style = 'position: absolute; top: 653px; left: 936px;' onmousedown = 'grabber(event);'>", "<img src='./puzzle/img"+randomNum+"-9.jpg' id='pic12' style = 'position: absolute; top: 653px; left: 1040px;' onmousedown = 'grabber(event);'>"];
    
    arr = imgRandomizer(arr);
    for(i=0;i<12;i++){
        document.writeln(arr[i]);
    }
}

function imgRandomizer(array){
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}