<?php
    session_start();
    require("conn.php");

    $_SESSION['sortOption'] = $_POST['sortMethod'];
    $_SESSION['orderType'] = $_POST['orderType'];
    // var_dump($_SESSION['orderType']);
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
                    
                <input type="submit" name="filterOption"/>
            </form>
        </div>
        <?php
            $query = 'SELECT Player.playerName, Team.teamName FROM Player LEFT JOIN Team ON 
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
            
            echo $query . "<br><br>";
        
            $result = mysql_query($query);
            
            echo "<table>";
            while($rows = mysql_fetch_array($result)){
                echo '<tr>';
                for($i = 0; $i < count($rows); $i++){
                    echo '<td>';
                    echo $rows[$i];
                    echo '</td>';
                }
                echo '</tr>';
            }
            echo "</table>";
        ?>
        <a href='#h1'>Back To Top</a>
    </body>
</html>