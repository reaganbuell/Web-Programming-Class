<?php
session_start();

if (!isset($_SESSION["number"]))
{
  $_SESSION["number"] = 0;
  $_SESSION["answer"] = "";
  $_SESSION["correct"] = 0;
  $_SESSION["question"] = "";
}

quizPage();

#######################################################################

 function quizPage (){
  print <<<TOP
  <head>
  <title>Astronomy Quiz</title>
  <meta charset="utf-8">
  <link rel = "stylesheet" title = "basic style" type = "text/css" href = "./quiz.css" media = "all" />
  </head>
  <body>
  <form id="return">
  <input type="submit" formaction="../index.html" value="<-- Back to Index" class="button"/>
  </form>
  <br/>
  <br/>
  <br/>
  <h1> Astronomy Quiz </h1>
TOP;
  
$number = $_SESSION["number"];
$question = $_SESSION["question"];
$answer = $_SESSION["answer"];
$correct = $_SESSION["correct"];
$endTime = (time() - $_SESSION["loginTime"])/120;
$total_number = 6;
$quiztaken = false;
   
// Parse results.txt
$history = file('results.txt');
$accessData = array();
foreach ($history as $line) {
    list($user, $score) = explode(':', $line);
    $accessData[trim($user)] = trim($score);
}

foreach($accessData as $user => $score){
  if($user == $_SESSION['user']){
    $number = 7;
    $quiztaken = true;
    $points = $score;
  }
}
   
if($endTime >= 900){
  $number = 7;
}
  
if ($number == 0){
  print <<<FIRST
  You will be given 6 questions in this quiz. <br /><br/>
  Here is your first question: <br /><br />
FIRST;
}
if ($number > 0){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST["choice"] == $answer){
      $correct++;
      $_SESSION["correct"] = $correct;
      print <<<CORRECT
        Yes, you are correct: $answer 
        <br /><br />
CORRECT;
    }else{
      print <<<WRONG
        Sorry, that is not correct: $answer was the correct answer
        <br /><br />
WRONG;
    }
  }
}

if ($number >= $total_number){
  $username = $_SESSION['user'];
  if($quiztaken){
    $grade = $points;
  }else{
    $grade = ($correct)*10;
    $data = $username.":".$grade."\n";
    $scoreData = fopen('results.txt','a') or die("Unable to open file!");
    fwrite($scoreData, $data);
    fclose($scoreData);
  }
  print <<<FINAL_SCORE
  Your final score is $grade correct out of 60. <br /><br />
FINAL_SCORE;
  session_destroy();
 
}else{
  $number++;
  $_SESSION["number"] = $number;
  if($number == 1){
   $question = "According to Kepler the orbit of the earth is a circle with the sun at the center.";
   $answer = "False";
   $_SESSION["question"] = $question;
   $_SESSION["answer"] = $answer;
   $script = $_SERVER['PHP_SELF'];
   print <<<Q1
   <form method = "post" action = $script>
   $number) True or False: $question <br>
   True
   <input type = "radio" name = "choice" value = "True" />
   False
   <input type = "radio" name = "choice" value = "False" />
   <input type = "submit" value = "Check Answer" />
   </form>
Q1;
  }elseif($number == 2){
    $question = "Ancient astronomers did consider the heliocentric model of the solar system but rejected it because they could not detect parallax.";
    $answer = "True";
    $_SESSION["question"] = $question;
    $_SESSION["answer"] = $answer;
    $script = $_SERVER['PHP_SELF'];
    print <<<Q2
    <form method = "post" action = $script>
    $number) True or False: $question <br>
    True
    <input type = "radio" name = "choice" value = "True" />
    False
    <input type = "radio" name = "choice" value = "False" />
    <input type = "submit" value = "Check Answer" />
    </form>
Q2;
  }elseif($number == 3){
    $question = "The total amount of energy that a star emits is directly related to its";
    $answer = "B";
    $_SESSION["question"] = $question;
    $_SESSION["answer"] = $answer;
    $script = $_SERVER['PHP_SELF'];
    print <<<Q3
    <form method = "post" action = $script>
    $number) Multiple Choice: $question <br>
    <input type = "checkbox" name = "choice" value = "A" />
    A) surface gravity and magnetic field <br>
    <input type = "checkbox" name = "choice" value = "B" />
    B) radius and temperature <br>
    <input type = "checkbox" name = "choice" value = "C" />
    C) pressure and volume <br>
    <input type = "checkbox" name = "choice" value = "D" />
    D) location and velocity <br>
    <input type = "submit" value = "Check Answer" />
    </form>
Q3;
  }elseif($number == 4){
    $question = "Stars that live the longest have";
    $answer = "D";
    $_SESSION["question"] = $question;
    $_SESSION["answer"] = $answer;
    $script = $_SERVER['PHP_SELF'];
    print <<<Q4
    <form method = "post" action = $script>
    $number) Multiple Choice: $question <br>
    <input type = "checkbox" name = "choice" value = "A" />
    A) high mass <br>
    <input type = "checkbox" name = "choice" value = "B" />
    B) high temperature <br>
    <input type = "checkbox" name = "choice" value = "C" />
    C) lots of hydrogen <br>
    <input type = "checkbox" name = "choice" value = "D" />
    D) small mass <br>
    <input type = "submit" value = "Check Answer" />
    </form>
Q4;
  }elseif($number == 5){
    $question = "A collection of a hundred billion stars, gas, and dust is called a _____.";
    $answer = "galaxy";
    $_SESSION["question"] = $question;
    $_SESSION["answer"] = $answer;
    $script = $_SERVER['PHP_SELF'];
    print <<<Q5
    <form method = "post" action = $script>
    $number) Fill in the Blank: $question <br>
    Answer:
    <input type = "text" name = "choice" value = "" />
    <input type = "submit" value = "Check Answer" />
    </form>
Q5;
  }else{
    $question = "The inverse of the Hubble's constant is a measure of the _____ of the universe. ";
    $answer = "age";
    $_SESSION["question"] = $question;
    $_SESSION["answer"] = $answer;
    $script = $_SERVER['PHP_SELF'];
    print <<<Q6
    <form method = "post" action = $script>
    $number) Fill in the Blank: $question <br>
    Answer:
    <input type = "text" name = "choice" value = "" />
    <input type = "submit" value = "Check Answer" />
    </form>
Q6;
  }  
}

print <<<BOTTOM
</body>
</html>
BOTTOM;
  
}

?>