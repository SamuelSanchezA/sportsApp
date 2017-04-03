<?php
    session_start();
    require("conn.php");
    
    $_SESSION['sortOption'] = $_POST['sortMethod'];
    $_SESSION['orderType'] = $_POST['orderType'];
    $_SESSION['selections'] = $_POST['selection'];
    $_SESSION['player_id'] = $_POST['player_ids'];
    $_SESSION['players'] = $_POST['player_names'];
    $_SESSION['position'] = $_POST['pos'];
    $_SESSION['team'] = $_POST['team'];

    $sortingOptions = ['Sort By', 'Team','Position','Name'];
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <title>Shopping Cart</title>
        <style type="text/css">
          table, th, td { 
            border: 1px solid black;
            border-collapse: collapse; }
          table th { 
            background-color: black;
            color: white; }    
          table tr:nth-child(even) { 
              background-color: #eee; }
          table tr:nth-child(odd)  { 
              background-color: #fff; }
          td {
              color: black;
          }
        </style>
        </style>
    </head>
    <body>
        <h1>My Shopping Cart</h1>
        <div class = 'returnButtonContainer'>
            <form action = 'jerseyPage.php' method='post'>
                <button class='returnButton'>Return To Jersey Page</button>
            </form>
            <form action = 'gameTickets.php' method='post'>
                <button class='returnButton'>Return To Ticket Page</button>
            </form>
        </div>
        <?php
        
            echo "<br>";
            echo "<table align = \"center\">";
            //header
            echo "<tr>";
              echo "<th>PlayerName</td>";
              echo "<th>Team</td>";
              echo "<th>Quantity</td>";
            echo "</tr>";
        
            for($i = 0; $i < count($_SESSION['selections']); $i++) {  
                if($_SESSION['selections'][$i] != '0') {
                    echo "<tr>";
                      echo "<td>{$_SESSION['players'][$i]}</td>";
                      echo "<td>{$_SESSION['team'][$i]}</td>";
                      echo "<td>{$_SESSION['selections'][$i]}</td>";
                    echo "</tr>";
                } 
            }      
            echo "</table>";
        ?>
    </body>
</html>