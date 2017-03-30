<?php
    session_start();
    require("conn.php");

    $_SESSION['sortOption'] = $_POST['sortMethod'];
    $_SESSION['orderType'] = $_POST['orderType'];
    $_SESSION['selections'] = $_POST['selection'];
    // $sortingOptions = ['Sort By', 'Away','Home'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <title>Football Store</title>
    </head>
    <body>
       <h1>Welcome to the Football Store!</h1>
        <h2>Jerseys</h2>
        <div id = 'option'>
            <!--<form action='' method = 'post'>-->
                <!--<select name = 'sortMethod'>-->
                    <?php
                        // if($_SESSION['sortOption'] == ''){
                        //     $_SESSION['sortOption'] = 'Sort By';
                        //     echo '<option>';
                        //     echo $_SESSION['sortOption'];
                        //     echo '</option>'; 
                        // }
                        // else{
                        //     echo '<option>';
                        //     echo $_SESSION['sortOption'];
                        //     echo '</option>';
                        // }
                        // for($i = 0; $i < count($sortingOptions); $i++){
                        //     if($sortingOptions[$i] != $_SESSION['sortOption']){
                        //         echo "<option>";
                        //         echo $sortingOptions[$i];
                        //         echo "</option>";
                        //     }
                        // }
                    ?>
                <!--</select>-->
                <?php
                    // if($_SESSION['orderType'] == 'ASC'){
                    //     echo "<label>Ascending<input type='radio' name='orderType' value='ASC' checked/></label>";
                    //     echo "<label>Descending<input type='radio' name='orderType' value='DESC'/></label>";
                    // }
                    // else if($_SESSION['orderType'] == 'DESC'){
                    //     echo "<label>Ascending<input type='radio' name='orderType' value='ASC'/></label>";
                    //     echo "<label>Descending<input type='radio' name='orderType' value='DESC' checked/></label>";
                    // }
                    // else{
                    //     echo "<label>Ascending<input type='radio' name='orderType' value='ASC'/></label>";
                    //     echo "<label>Descending<input type='radio' name='orderType' value='DESC'/></label>";
                    // }
                ?>
                    
                <!--<button id = 'searchButton' type="submit" name="filterOption">Search</button>-->
            <!--</form>-->
        </div>
        <a href='#bottom' id = 'top'>Go To Bottom</a>
        <div class='returnButtonContainer'>
            <form action = 'shoppingCart.php' method = 'post'>
                <button class='returnButton' type="submit" name="shoppingCart"/>Go To Shopping Cart </button>
            </form>
            <form action = 'jerseyPage.php' method = 'post'>
                <button class='returnButton' type="submit" name="shoppingCart"/>Go To Jersey Page </button>
            </form>
        </div>
        <?php
            $query1 = 'SELECT * FROM Team RIGHT JOIN Tickets ON 
                      Tickets.home = Team.teamId';
            $query2 = 'SELECT * FROM Team RIGHT JOIN Tickets ON 
                      Tickets.away = Team.teamId';
                      
            $result1 = mysql_query($query1);
            $result2 = mysql_query($query2);
            
            
            echo "<form action = 'shoppingCart.php' method = 'post'>";
            echo "<table>";
            for($i = 0; $i < 40; $i++){
                $rows1 = mysql_fetch_array($result1);
                $rows2 = mysql_fetch_array($result2);
                echo '<tr>';
                
                echo '<td>';
                echo $rows1[1];
                echo '</td>';
                echo '<td>';
                echo $rows2[1];
                echo '</td>';
                
                echo '<td>';
                echo "QTY <input type='text' name = 'selection[]' value = '0'/>";
                echo "</td>";
                echo "<input type='hidden' value=" . "'" . $rows[2] . "'" . " name='ticket_ids[]' />";
                echo '</tr>';
            }
            echo "</table>";
            echo "<button type='submit' name = 'addToCart'>Add To Cart</button>";
            echo "</form>";
        ?>
        <a href='#top' id='bottom'>Back To Top</a>
    </body>
</html>