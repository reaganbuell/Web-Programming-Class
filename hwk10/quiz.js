function grade() {
    var q1 = document.quiz.q1.value;
    var q2 = document.quiz.q2.value;
    var q3 = document.querySelector('.q3:checked').value;
    var q4 = document.querySelector('.q4:checked').value;
    var q5 = document.quiz.q5.value;
    var q6 = document.quiz.q6.value;
    
    var totalNum = 6;
    var qNum = 0;
    var correctNum = 0;
    var exception = 1;
    
    var answers = [q1, q2, q3, q4, q5, q6];
    var truths = ["false","true","b","d", "galaxy", "age"];
    
    while(qNum < totalNum){
            if(answers[qNum] != ""){
                exception = 0;
                if(answers[qNum] == truths[qNum]){
                    correctNum++;
                    qNum++;
                } else{
                    qNum++;
                }
            } else{
                exception = 1;
                break;
            }
    }
    if(exception == 0){
        window.alert("Your grade is " +correctNum+"/"+totalNum);
    } else{
        window.alert("Quiz not completed, please fill in all answers before grading.");
    }
    
}

function countCheckboxes(){
      var inputs = document.getElementsByTagName("input");
      var count = 0;
      for (var i=0; i<inputs.length; i++) {
        if (inputs[i].type === "checkbox" && inputs[i].checked === true) {
          count++;
        }
      }
      if(count < 1){
        return true;
      }
}