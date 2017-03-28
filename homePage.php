<?php
    session_start();
    require("conn.php");
    
    $_SESSION['sortOption'] = $_POST['sortMethod'];
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
            <input type="submit" name="filterOption"/>
        </form>
        <?php
            $query = 'SELECT teamName FROM Team ORDER BY teamName ASC';
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