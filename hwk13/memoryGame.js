var turns = 0;
var firstId = null;
var secondId = null;
var numOfClicks = 0;
var grid = [
  ["1", "2", "3", "4"],
  ["1", "2", "3", "4"],
  ["5", "6", "7", "8"],
  ["5", "6", "7", "8"]
];

function activate(){
    grid.forEach(shuffle);
    shuffle(grid);
    assignValue();
    $(".button").click(function(){
        $(this).fadeIn(3000,);
        $(this).fadeOut(3000);
    });
}

function shuffle(array) {
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

function assignValue(){
    for(var i = 0; i < 4; i++){
        for(var j = 0; j < 4; j++){
            document.getElementById("b"+i+j).value = grid[i][j];
        }
    }
}

function compareIds(){
    if(document.getElementById(firstId).value == document.getElementById(secondId).value){
        return true;
    } else{
        return false;
    }
}

function restart(){
    location.reload();
}