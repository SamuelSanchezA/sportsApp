<?php
    session_start();
    require("conn.php");
    
    $_SESSION['sortOption'] = $_POST['sortMethod'];
    $_SESSION['orderType'] = $_POST['orderType'];
    $_SESSION['selections'] = $_POST['selection'];
    $sortingOptions = ['Sort By', 'Team','Position','Name'];
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <title>Shopping Cart</title>
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
            echo "<table>";
            for($i = 0; $i < count($_SESSION['selections']); $i++){
                if($_SESSION['selections'][$i] != '0'){
                    echo "<tr><td>" . $_SESSION['selections'][$i] . "</td></tr>";
                }
            }
            echo "</table>";
        ?>
    </body>
</html>