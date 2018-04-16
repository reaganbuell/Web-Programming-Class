<html>
    <head>
        <title> User Count </title>
    </head>
    <body>
        <?php
        
        
        
        $counterfile = "./counter.txt";
        $f = fopen($counterfile, "r+");
        $counter = fgets($counterfile);
        $counter++;
        fwrite($counterfile, $counter);
        fclose($f);

        echo "You are visitor number $counter to this site";

        ?>
    </body>
</html>