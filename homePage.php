<?php
    session_start();
    require("conn.php");
    
    $_SESSION['teamFilter'] = $_POST['teamFilter'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <title>Football Store</title>
    </head>
    <body>
        <h1>Welcome to the Football Store!</h1>
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