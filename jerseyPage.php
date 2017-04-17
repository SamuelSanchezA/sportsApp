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
        <title>Football Store</title>
    </head>
    <body>
       <h1>Welcome to the Football Store!</h1>
        <h2>Jerseys</h2>
        <div id = 'option'>
            <form action='' method = 'post'>
                <select name = 'sortMethod'>
                    <?php
                        if($_SESSION['sortOption'] == ''){
                            $_SESSION['sortOption'] = 'Sort By';
                            echo '<option>';
                            echo $_SESSION['sortOption'];
                            echo '</option>'; 
                        }
                        else{
                            echo '<option>';
                            echo $_SESSION['sortOption'];
                            echo '</option>';
                        }
                        for($i = 0; $i < count($sortingOptions); $i++){
                            if($sortingOptions[$i] != $_SESSION['sortOption']){
                                echo "<option>";
                                echo $sortingOptions[$i];
                                echo "</option>";
                            }
                        }
                    ?>
                </select>
                <?php
                    if($_SESSION['orderType'] == 'ASC'){
                        echo "<label>Ascending<input type='radio' name='orderType' value='ASC' checked/></label>";
                        echo "<label>Descending<input type='radio' name='orderType' value='DESC'/></label>";
                    }
                    else if($_SESSION['orderType'] == 'DESC'){
                        echo "<label>Ascending<input type='radio' name='orderType' value='ASC'/></label>";
                        echo "<label>Descending<input type='radio' name='orderType' value='DESC' checked/></label>";
                    }
                    else{
                        echo "<label>Ascending<input type='radio' name='orderType' value='ASC'/></label>";
                        echo "<label>Descending<input type='radio' name='orderType' value='DESC'/></label>";
                    }
                ?>
                    
                <button id = 'searchButton' type="submit" name="filterOption">Search</button>
            </form>
        </div>
        <a href='#bottom' id = 'top'>Go To Bottom</a>
        <div class='returnButtonContainer'>
            <form action = 'shoppingCart.php' method = 'post'>
                <button class='returnButton' type="submit" name="shoppingCart"/>Go To Shopping Cart </button>
            </form>
            <form action = 'gameTickets.php' method='post'>
                <button class='returnButton'>Go To Ticket Page</button>
            </form>
        </div>
        <?php
            $query = 'SELECT * FROM Player LEFT JOIN Team ON 
                      Team.teamId = Player.teamId';
            if($_SESSION['sortOption'] == 'Team'){
                $query .= " ORDER BY Team.teamName";
                if($_SESSION['orderType'] != null){
                    $query .= " " . $_SESSION['orderType'];
                }
            }
            
            else if($_SESSION['sortOption'] == 'Name'){
                $query .= " ORDER BY Player.playerName";
                if($_SESSION['orderType'] != null){
                    $query .= " " . $_SESSION['orderType'];
                }
            }
            
            else if($_SESSION['sortOption'] == 'Position'){
                $query .= " ORDER BY Player.position";
                if($_SESSION['orderType'] != null){
                    $query .= " " . $_SESSION['orderType'];
                }
            }
        
            $result = mysql_query($query);
            echo "<form action = 'shoppingCart.php' method = 'post'>";
            echo "<table>";
            echo "<tr>";
            echo "<td>";
            echo "Position";
            echo "</td>";
            echo "<td>";
            echo "Player";
            echo "</td>";
            echo "<td>";
            echo "Team";
            echo "</td>";
            echo "</tr>";
            while($rows = mysql_fetch_array($result)){
                //0. Player Id.
                //1. Player name.
                //2. Team Id.

                // // for($i = 0; $i < count($rows); $i++){
                echo '<td>';
                echo $rows[2];
                echo '</td>';
                echo '<td>';
                echo $rows[1];
                echo '</td>';
                echo '<td>';
                echo $rows[5];
                echo '</td>';
                // // }
                echo '<td>';
                echo "QTY <input type='text' name = 'selection[]' value = '0'/>";
                echo "</td>";
                echo "<input type='hidden' value=" . "'" . $rows[0] . "'" . " name='player_ids[]' />";
                echo '</tr>';
                echo "<input type='hidden' value=" . "'" . $rows[1] . "'" . " name='player_names[]' />";
                echo '</tr>';
                echo "<input type='hidden' value=" . "'" . $rows[4] . "'" . " name='team[]' />";
                echo '</tr>';
            }
            echo "</table>";
            echo "<button type='submit' name = 'addToCart'>Add To Cart</button>";
            echo "</form>";
        ?>
        <a href='#top' id='bottom'>Back To Top</a>
    </body>
</html>