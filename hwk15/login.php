<?php 
session_start();

$script = $_SERVER['PHP_SELF'];

if(isset($_SESSION['authenticate'])){
  if($_SESSION['authenticate']){
    $_SESSION['user'] = $_POST['username'];
    header('Location:quiz.php');
  }else{
    loginPage();
    // Parse passwd.txt
    $loginData = file('passwd.txt');
    $accessData = array();
    foreach ($loginData as $line) {
        list($username, $password) = explode(':', $line);
        $accessData[trim($username)] = trim($password);
    }

    // Parse form input
    $postuser = isset($_POST['username']) ? $_POST['username'] : '';
    $postpass = isset($_POST['password']) ? $_POST['password'] : '';

    // Check input versus login.txt data
    if (array_key_exists($postuser, $accessData) && $postpass == $accessData[$postuser]) {
      $_SESSION['authenticate'] = true;
      $_SESSION['user'] = $_POST['username'];
      $_SESSION['loginTime'] = time();
      header('Location:quiz.php');
    } else {
        echo "<center>Invalid username and/or password</center>";
    }
  }
}else{
  $_SESSION['authenticate'] = false;
  loginPage();
}

function loginPage(){
  print <<<LOGIN_PAGE
  <!DOCTYPE html>
  <html>
    <head>
      <title> Login </title>
      <meta charset="utf-8">
      <link rel = "stylesheet" title = "basic style" type = "text/css" href = "./quiz.css" media = "all" />
    </head>
    <body>
      <form id="return">
        <input type="submit" formaction="../index.html" value="<-- Back to Index" class="button"/>
      </form>
      <br/> <br/> <br/> <br/>
      <h3> Quiz Access Login </h3>
      <form method = "post" action = "$script">
        <table border = "0">
          <tr>
            <td> Name: </td>
            <td> <input type = "text" name = "username" required = "required"/></td>
          </tr>
          <tr>
            <td> Password: </td>
            <td> <input type = "password" name = "password" required = "required" /></td>
          </tr>
          <tr>
            <td><input type = "submit" name = "login" value = "Login" /></td>
            <td><input type = "reset" value = "Reset" /></td>
          </tr>
        </table>
      </form>
    </body>
  </html>
LOGIN_PAGE;
}

?>