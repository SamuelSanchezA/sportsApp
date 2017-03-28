<?php

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "FootballStore";
    
    $con=mysql_connect($localhost, $username, $password);
    if(!mysql_select_db($dbname, $con)){
        echo "Error: Database failed to load. <br>";
    }
?>