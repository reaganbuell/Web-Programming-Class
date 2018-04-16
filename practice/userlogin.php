<?php
  # get the incoming information
  extract ($_POST);
  $name = $_POST["username"];
  $password = $_POST["password"];

  # open file 'password.txt' and read the name and password
  if ($fh = fopen ("password.txt", "r")){
      while(!$fh->eof()){
        $line = $fh->fgets();
        if($line == $name:$password){

        }
      }
    fread ($fh, "$name:$password \n");
    fclose ($fh);
  }
    # Write thank you page
    print <<<LOGIN_RESULT
    <html>
    <head>
    <title> Login Result </title>
    </head>
    <body>
    <h1> Thank You for Logining in! </h1>
    </body>
    </html>
LOGIN_RESULT;
?>